<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // Số lượng item trên mỗi trang
        $currentPage = $request->get('page', 1); // Trang hiện tại, mặc định là trang 1

        $accounts = Account::skip(($currentPage - 1) * $perPage)
            ->take($perPage)
            ->get();

        $totalAccounts = Account::count();

        $lastPage = ceil($totalAccounts / $perPage);

        return view('admin.page.account_page.index', compact('accounts', 'currentPage', 'lastPage'));
    }

    public function create()
    {
        return view('admin.page.account_page.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'nullable|unique:accounts',
            'password' => 'nullable',
            'email' => 'nullable|email|unique:accounts',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable',
        ]);
    
        // Xử lý tải lên ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('account_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        try {
            // Tạo mới tài khoản và tự động cập nhật các trường thời gian
            $account = Account::create(array_merge($validatedData, [
                'account_date' => now(),
                'account_update' => now(),
            ]));
    
            return redirect()->route('accounts.index')
                ->with('success', 'Account created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the account.'])->withInput();
        }
    }
    

    public function show(Account $account)
    {
        return view('admin.page.account_page.show', compact('account'));
    }

    public function edit(Account $account)
    {
        return view('admin.page.account_page.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $validatedData = $request->validate([
            'username' => ['nullable', Rule::unique('accounts')->ignore($account)],
            'password' => 'nullable',
            'email' => ['nullable', 'email', Rule::unique('accounts')->ignore($account)],
            'account_type' => 'nullable',
            'image' => 'nullable',
            'account_date' => 'nullable|date',
            'account_update' => 'nullable|date',
        ]);

        $account->update($validatedData);

        return redirect()->route('accounts.show', $account->account_id)
            ->with('success', 'Account updated successfully');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')
            ->with('success', 'Account deleted successfully');
    }
}