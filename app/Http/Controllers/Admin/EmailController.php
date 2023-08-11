<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailRequest;
use App\Models\MailTemplate;
use App\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct(
        private EmailService $emailService
    ) {
    }
    public function index(Request $request, MailTemplate $mail = null)
    {
        $emails = $this->emailService->getEmails();
        return view('admin.email.index', compact('emails', 'mail'));
    }
    public function edit(MailTemplate $email)
    {
        $content = $this->emailService->getContent($email);
        return view('admin.email.edit', compact('email', 'content'));
    }
    public function update(EmailRequest $request, MailTemplate $email)
    {
        $data = $request->validated();
        $result = $this->emailService->update($data, $email);
        return redirect()->route('admin.email.edit', $email)->with($result);
    }
}
