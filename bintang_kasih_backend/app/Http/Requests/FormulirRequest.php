<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulirRequest extends FormRequest
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
        // Cek jika request ini adalah update
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'nik' => $isUpdate ? 'sometimes|string' : 'required|string',
            'fullName' => 'required|string|max:255',
            'nickName' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'birthPlace' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'religion' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'childOf' => 'required|integer',
            'domicileAddress' => 'required|string|max:255',
            'kkAddress' => 'required|string|max:255',
            'isPKH_KIP' => 'required|string|in:Ya,Tidak',
            'image' => $isUpdate ? 'nullable|max:2048' : 'required|max:2048',
            'imageKK' => $isUpdate ? 'nullable|max:2048' : 'required|max:2048',
            'imageBirthCert' => $isUpdate ? 'nullable|max:2048' : 'required|max:2048',
            'imagePKH_KIP' => 'nullable|max:2048',
            'classType' => $isUpdate ? 'sometimes|string|in:KB,TK A' : 'required|string|in:KB,TK A',
            'users_id' => 'sometimes|integer|exists:users,id',

            'fatherName' => 'required|string|max:255',
            'fatherNIK' => 'required|string|max:16', // Ensure unique in parents table
            'fatherAddress' => 'required|string|max:255',
            'fatherReligion' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'fatherLastEdu' => 'required|string|max:255',
            'fatherJob' => 'required|string|max:255',
            'fatherSallary' => 'required|string|max:255',
            'fatherPhone' => 'required|string|max:255',

            'motherName' => 'required|string|max:255',
            'motherNIK' => 'required|string|max:16', // Ensure unique in parents table
            'motherAddress' => 'required|string|max:255',
            'motherReligion' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'motherLastEdu' => 'required|string|max:255',
            'motherJob' => 'required|string|max:255',
            'motherSallary' => 'required|string|max:255',
            'motherPhone' => 'required|string|max:255',
        ];
    }
}
