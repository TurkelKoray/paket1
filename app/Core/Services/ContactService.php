<?php


    namespace App\Core\Services;


    use App\Core\Models\Contact;

    class ContactService
    {
        private $contact;

        public function __construct(Contact $contact)
        {
            $this->contact = $contact;
        }

        public function messageStateChange($id, $state)
        {
            $contact        = $this->contact->find($id);
            $contact->state = $state;
            $contact->save();
        }

        public function delete($id)
        {
            $contact          = $this->contact->find($id);
            $contact->deleted = 1;
            $contact->save();
        }

        public function destroy($id)
        {
            $contact = $this->contact->find($id);
            $contact->delete();
        }

        public function messageSend($data)
        {
            $createData = [
                "name"    => $data["name"],
                "phone"   => $data["phone"],
                "email"   => $data["email"],
                "subject" => $data["subject"],
                "message" => $data["message"],
                "ip"      => $data["ip"],
            ];

            $this->contact->create($createData);
        }

        public function weSend($data)
        {
            $createData = [
                "name"  => $data["name"],
                "email" => $data["email"],
                "phone" => $data["phone"],
                "ip"    => $data["ip"],
            ];

            $this->contact->create($createData);
        }

    }
