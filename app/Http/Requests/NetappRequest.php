<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NetappRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "service.name" => "required|string|max:255",
            "service.about" => "required|string",
            // 'service.tag' => 'required|array',
            "service.publishedBy" => "required|string",
            'service.category' => 'required|exists:categories,id',
            'service.logo' => 'required|string',
            'service.type' => 'required|exists:netapp_types,id',
            'service.version' => 'required|between:0,99.99',
            "policy.agreePolicy" => "required|boolean",
            "deployment.imageUrl" => 'required|url',
            "deployment.report" => 'required|url',
            "deployment.dockerSize" => 'required|integer',
            "pricing.price" => 'required|integer',
            "tutorial.docs" => 'required|string',
            "tutorial.pdf" => 'required|string',


        ];
        $rules["service.appSlug"] = "required|string";
        if ($this->request->get('service')["publishedBy"] == "business") {
            $rules['service.businessName'] = 'required|string|max:255';
            $rules["service.socialNumber"] = "required|integer";
        }
        if ($this->request->get("payasgo")) {
            $rules["payAsGo"] = 'required|array';
            $rules["payAsGo.*.api_url"] = 'required|url';
            $rules["payAsGo.*.prices"] = 'required|array';
            $rules["payAsGo.*.prices.*.from"] = 'required|integer';
            $rules["payAsGo.*.prices.*.to"] = 'required|integer';
            $rules["payAsGo.*.prices.*.unlimited"] = 'boolean';
            $rules["payAsGo.*.prices.*.cost"] = 'required|integer';
            $rules["payAsGo.*.prices.*.plan_category"] = 'required|string';
        }

        return $rules;
    }
    public function message()
    {
        $message = [
            "service.name" => "Name is Required",
            "service.about" => "About Field is Required",
            // 'service.tag' => 'Add atleast One Tag',
            "service.publishedBy" => "Publisher is Required",
            'service.category' => 'select atleast one category',
            'service.logo' => 'Choose A Logo Image',
            'service.type' => 'select atleast one type',
            'service.version' => 'Version is Required',
            "policy.agreePolicy" => "Check on the policy",
            "deployment.imageUrl" => 'Docker image Url is Required',
            "deployment.report" => 'Docker Certificate Report is Required',
            "deployment.dockerSize" => 'Docker Size is Required',
            "pricing.price" => 'Price is Required',
            "tutorial.docs" => 'Tutorial Note is Required',
        ];
        $rules["service.appSlug"] = "required|string";

        if ($this->request->get('service')["publishedBy"] == "business") {
            $message['service.businessName'] = 'Business Name is Required';
            $message["service.socialNumber"] = "Social Name is Required";
        }
        if (!$this->request->get('editRequest')) {
            $message["service.appSlug"] = "Slug is Already Exists";
        }
        if ($this->request->get("payasgo")) {
            $message["payAsGo"] = 'Please Add Price Plan';
            $message["payAsGo.*.api_url"] = 'Api Url is Required';
            $message["payAsGo.*.prices"] = 'Add Prices';
            $message["payAsGo.*.prices.*.from"] = 'Select From Amount';
            $message["payAsGo.*.prices.*.to"] = 'Select To Amount';
            $message["payAsGo.*.prices.*.unlimited"] = 'Select To Amount';
            $message["payAsGo.*.prices.*.cost"] = "Cost Field is Required";
            $message["payAsGo.*.prices.*.plan_category"] = "Category Field is Required";
        }
        return $message;
    }
}
