<?php

namespace Core;

class Validator {
    private $errors = [];

    public function isEmptyString($string, $attrName = "")
    {
        if (strlen($string) == 0) {
            if ($attrName) {
                $attrName = ucfirst($attrName);
                $this->errors[] = "$attrName field is required.";
            }
            return true;
        } else {
            return false;
        }
    }

    public function minLengthLimitNotReached($string, $minLength, $attrName = "")
    {
        if (strlen($string) < $minLength && !$this->isEmptyString($string)) {
            if ($attrName) {
                $attrName = ucfirst($attrName);
                $this->errors[] = "$attrName field shouldn't have less than $minLength characters.";
            }
            return true;
        } else {
            return false;
        }
    }

    public function maxLengthLimitExceeded($string, $maxLength, $attrName = "") {
        $attrName = ucfirst($attrName);
        if (strlen($string) > $maxLength) {
            if ($attrName) {
                $attrName = ucfirst($attrName);
                $this->errors[] = "$attrName field shouldn't have more than $maxLength characters.";
            }
            return true;
        } else {
            return false;
        }
    }

    public function email($string, $attrName = "")
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL) && !$this->isEmptyString($string)) {
            if ($attrName) {
                $attrName = ucfirst($attrName);
                $this->errors[] = "$attrName field is not a valid email.";
            }
            return false;
        } else {
            return true;
        }
    }

    public function confirmed($attributes, $displayErrorMessage = false)
    {
        if ($attributes['password'] != $attributes['password_confirmation']) {
            if ($displayErrorMessage) {
                $this->errors[] = "The password confirmation does not match.";
            }
            return false;
        } else {
            return true;
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}