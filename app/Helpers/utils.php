<?php

use App\Models\Categories;
use App\Models\Messages;
use App\Models\Products;

function getStatusTable($status)
{
    switch ($status) {
        case '1':
            return "Ativo";
        case '0':
            return "Inativo";
        default:
            return "";
    }
}

function convertStringDate($data)
{
    $hoje = date('Y-m-d');
    $ontem = date('Y-m-d', strtotime('-1 day'));

    if ($data === $hoje) {
        return 'Hoje';
    } elseif ($data === $ontem) {
        return 'Ontem';
    } else {
        return $data;
    }
}

function getCategories()
{
    return Categories::where('status', 1)->orderBy('name')->get();
}

function getAllProducts()
{
    return Products::where('status', 1)
        ->with([
            'category',
            'images',
            'models'
        ])->orderBy('name')->get();
}


function getAllMessages()
{
    return Messages::orderBy('created_at', 'desc')->get();
}

function getMessagesNotRead()
{
    return Messages::where('read', 0)->get();
}
