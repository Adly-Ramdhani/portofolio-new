@extends('Admin.admin')

@section('title', 'Dashboard')

@section('content')

        <div class="bg-[#1e293b] p-4 rounded-xl shadow flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-white">Dashboard</h1>
            <p>Welcome, {{ Auth::user()->name ?? 'Admin' }} 👋</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-[#1e293b] p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-lg font-bold text-indigo-400 mb-2">Total Users</h2>
                <p class="text-gray-400">1,245 registered users</p>
            </div>
            <div class="bg-[#1e293b] p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-lg font-bold text-indigo-400 mb-2">Sales</h2>
                <p class="text-gray-400">$23,500 this month</p>
            </div>
            <div class="bg-[#1e293b] p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-lg font-bold text-indigo-400 mb-2">Active Sessions</h2>
                <p class="text-gray-400">87 users online</p>
            </div>
        </div>

@endsection