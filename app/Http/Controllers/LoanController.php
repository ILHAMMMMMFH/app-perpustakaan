<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\LoanItem;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'loanItems.book'])->latest()->paginate(10);

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();

        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'integer|exists:books,id',
        ]);

        DB::transaction(function () use ($validated) {
            $loan = Loan::create([
                'loan_code' => 'L-' . strtoupper(uniqid()),
                'member_id' => $validated['member_id'],
                'user_id' => auth()->id(),
                'loan_date' => $validated['tanggal_pinjam'],
                'due_date' => $validated['tanggal_kembali'],
                'status' => 'dipinjam',
            ]);

            foreach ($validated['book_ids'] as $bookId) {
                LoanItem::create([
                    'loan_id' => $loan->id,
                    'book_id' => $bookId,
                    'quantity' => 1,
                ]);

                Book::where('id', $bookId)->decrement('stock', 1);
            }
        });

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }

    public function show(Loan $loan)
    {
        $loan->load(['member', 'loanItems.book']);

        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        $members = Member::all();
        $books = Book::all();

        return view('loans.edit', compact('loan', 'members', 'books'));
    }

    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
            'status' => 'required|in:dipinjam,kembali',
        ]);

        $loan->update($validated);

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Loan $loan)
    {
        DB::transaction(function () use ($loan) {
            if ($loan->status === 'dipinjam') {
                foreach ($loan->loanItems as $item) {
                    Book::where('id', $item->book_id)->increment('stock', $item->quantity);
                }
            }
            $loan->loanItems()->delete();
            $loan->delete();
        });

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function kembalikan($id)
    {
        $loan = Loan::with('loanItems')->findOrFail($id);

        if ($loan->status !== 'kembali') {
            DB::transaction(function () use ($loan) {
                $loan->update([
                    'status' => 'kembali',
                    'return_date' => now()->toDateString(),
                ]);

                foreach ($loan->loanItems as $item) {
                    Book::where('id', $item->book_id)->increment('stock', $item->quantity);
                }
            });
        }

        return redirect()->route('loans.index')
            ->with('success', 'Buku telah berhasil dikembalikan.');
    }
}