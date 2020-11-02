<?php

namespace App\Http\Controllers;

use App\Core\Models\Contact;
use App\Core\Repositories\ContactRepository\ContactRepository;
use App\Core\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(ContactRepository $contactRepository)
    {
        $active    = 0 ;
        $contacts  = $contactRepository->getNewMessages();
        return view("admin.contact.index",compact('contacts'))->with('active',$active);
    }

    public function old(ContactRepository $contactRepository)
    {
        $active    = 1 ;
        $contacts  = $contactRepository->getOldMessages();
        return view("admin.contact.index",compact('contacts'))->with('active',$active);;
    }

    public function show($id,ContactRepository $contactRepository,ContactService $contactService)
    {
        $contact   = $contactRepository->getByFindId($id);
        $contactService->messageStateChange($id,1);
        return view("admin.contact.show",compact('contact'));
    }

    public function delete($id,ContactService $contactService)
    {
        $contactService->delete($id);
       return $this->response();
    }

    public function destroy($id,ContactService $contactService)
    {
        $contactService->destroy($id);
       return $this->response();
    }
}
