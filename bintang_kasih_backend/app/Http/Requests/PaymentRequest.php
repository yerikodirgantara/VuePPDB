<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'isChurch_Member' => 'required|string|in:Ya,Tidak',
            'imageChurchMember' => 'nullable|max:2048',  // Maksimal 2 MB
            'regisWave' => 'required|string|max:255',
            'classType' => 'required|string|in:KB,TK A',
            'paymentSPI' => 'required|integer',
            'paymentSPP' => 'required|integer',
            'paymentTotal' => 'required|integer',
            'imagePayment' => 'required|max:2048',
            'paymentStatus' => 'required|string|in:PENDING,PAID,FAILED',
            // 'students_id' => 'required|integer|exists:students,id', // Ensure this references the correct relationship
        ];
    }

}
