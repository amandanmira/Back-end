<?php
class Form
{
    var $fields = array();
    var $action;
    var $submit = "";
    var $jumField = 0;

    function __construct(string $action, string $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayForm()
    {
        echo "<form action='{$this->action}' method='post'>";
        echo "<table width='100%'>"; // Fixed: widht -> width

        for ($i = 0; $i < $this->jumField; $i++) {
            $field = $this->fields[$i];
            $type = $field['type'];
            $label = $field['label'];
            $name = $field['name'];
            $isRequired = $field['required'] ? 'required' : '';

            echo "<tr>";
            echo "<td align='right' style='vertical-align: top;'>{$label}</td>";
            echo "<td>";

            switch ($type) {
                case "radio":
                    foreach ($field['options'] as $option) {
                        echo "<input type='{$type}' name='{$name}' 
                            value='{$option}' {$isRequired}> {$option}<br>";
                    }
                    break;

                case "checkbox":
                    foreach ($field['options'] as $option) {
                        echo "<input type='{$type}' name='{$name}[]' 
                            value='{$option}' {$isRequired}> {$option}<br>";
                    }
                    break;

                case "select":
                    echo "<select name='{$name}' {$isRequired}>";
                    foreach ($field['options'] as $option) {
                        echo "<option value='{$option}'>{$option}</option>";
                    }
                    echo "</select>";
                    break;

                case "textarea":
                    echo "<textarea name='{$name}' {$isRequired}></textarea>";
                    break;

                default:
                    echo "<input type='{$type}' name='{$name}' {$isRequired}>";
                    break;
            }

            echo "</td></tr>";
        }

        echo "<tr><td><input type='submit' name='tombol' 
            value='{$this->submit}' ></td></tr>";
        echo "<tr><td><input type='reset'></td></tr>";
        echo "</table>";
    }

    function addField(
        string $name,
        string $label,
        string $type = "text",
        array $options = [],
        bool $isRequired = false
    ) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['options'] = $options;
        $this->fields[$this->jumField]['required'] = $isRequired;
        $this->fields[$this->jumField++]['label'] = $label;
    }
}
