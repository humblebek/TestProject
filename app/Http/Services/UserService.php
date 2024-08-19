<?php

namespace App\Http\Services;

use App\Models\Address;
use App\Models\Bank;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Http;

Class UserService{
    public function fetchUsers()
    {
        $url = 'https://dummyjson.com/users';
        $response = Http::get($url);

        if ($response->successful()) {
            $users = $response->json('users');

            foreach ($users as $userData) {
                $user = User::updateOrCreate(
                    ['id' => $userData['id']],
                    [
                        'first_name' => $userData['firstName'] ?? '',
                        'last_name' => $userData['lastName'] ?? '',
                        'maiden_name' => $userData['maidenName'] ?? '',
                        'age' => $userData['age'] ?? 0,
                        'gender' => $userData['gender'] ?? '',
                        'email' => $userData['email'] ?? '',
                        'phone' => $userData['phone'] ?? '',
                        'username' => $userData['username'] ?? '',
                        'password' => bcrypt($userData['password'] ?? 'default_password'),
                        'birth_date' => $userData['birthDate'] ?? null,
                        'image' => $userData['image'] ?? '',
                        'blood_group' => $userData['bloodGroup'] ?? '',
                        'height' => $userData['height'] ?? 0,
                        'weight' => $userData['weight'] ?? 0,
                        'eye_color' => $userData['eyeColor'] ?? '',
                        'hair_color' => $userData['hair']['color'] ?? '',
                        'hair_type' => $userData['hair']['type'] ?? '',
                        'ip' => $userData['ip'] ?? '',
                        'mac_address' => $userData['macAddress'] ?? '',
                        'university' => $userData['university'] ?? '',
                        'ein' => $userData['ein'] ?? '',
                        'ssn' => $userData['ssn'] ?? '',
                        'user_agent' => $userData['userAgent'] ?? '',
                        'role' => $userData['role'] ?? 'user'
                    ]
                );

                Address::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'address' => $userData['address']['address'] ?? '',
                        'city' => $userData['address']['city'] ?? '',
                        'state' => $userData['address']['state'] ?? '',
                        'state_code' => $userData['address']['stateCode'] ?? '',
                        'postal_code' => $userData['address']['postalCode'] ?? '',
                        'lat' => $userData['address']['latitude'] ?? 0,
                        'lng' => $userData['address']['longitude'] ?? 0,
                        'country' => $userData['address']['country'] ?? ''
                    ]
                );

                Company::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'department' => $userData['company']['department'] ?? '',
                        'name' => $userData['company']['name'] ?? '',
                        'title' => $userData['company']['title'] ?? '',
                        'address_id' => $user->address->id
                    ]
                );

                Bank::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'card_expire' => $userData['bank']['cardExpire'] ?? '',
                        'card_number' => $userData['bank']['cardNumber'] ?? '',
                        'card_type' => $userData['bank']['cardType'] ?? '',
                        'currency' => $userData['bank']['currency'] ?? '',
                        'iban' => $userData['bank']['iban'] ?? ''
                    ]
                );
            }
        return response()->json(['message' => 'Failed to fetch users.'], 500);
    }

}
}
?>
