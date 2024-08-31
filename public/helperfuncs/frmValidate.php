<?php 
class ValidateData 
{
    private  $data;
    public  $errors = [];

    public function __construct($postData)

    {
        $this->data = $postData;

    }
    public function validate()
    {   
        $this->validateEmptyFeilds();
        $this->validateEmail();
        $this->showErrors();
    }
    protected function validateEmptyFeilds()
    {
        foreach($this->data as $k=>$v)
        {
            if(empty($v))
            {
                $this->errors [] = ucfirst($k) . "Is Empty";
            }
        }
        
        
    }
    
    private function validateEmail()
    {
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors [] = "Invalid Email";
        }
        
    }
    public function showErrors()
    {
        foreach ($this->errors as $error) {
            echo '<div class="bg-red-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">' . $error . '&ensp;'.'</div>'.'<br />';
        }
    }

}