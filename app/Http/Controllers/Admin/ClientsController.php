<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::orderBy('name')->get();
        return view('admin.pages.clients.index', [
            'clients' => $clients
        ]);
    }
}
