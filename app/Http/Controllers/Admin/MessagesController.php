<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Exception;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.messages.index');
    }

    public function open(Request $request)
    {
        $message = Messages::find($request->id);

        $message->update([
            'read' => 1
        ]);

        return view('admin.pages.messages.open', [
            'message' => $message
        ]);
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'subject' => 'required|string',
                'message' => 'required|string',
            ], [
                'name.required' => 'Informe seu nome',
                'email.required' => 'Informe seu email',
                'email.email' => 'Informe um email válido',
                'phone.required' => 'Informe seu telefone',
                'subject.required' => 'Informe o assunto',
                'message.required' => 'Descreva sua mensagem',
            ]);

            $store = Messages::create($request->all());

            if ($store) {
                return response()->json([
                    'alert' => true,
                    'type' => 'success',
                    'message' => 'Mensagem enviada com sucesso'
                ]);
            }

            return response()->json([
                'alert' => true,
                'type' => 'danger',
                'message' => 'Erro ao enviar esta mensagem'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }
}
