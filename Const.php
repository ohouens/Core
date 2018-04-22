<?php
class Const{
    private function __construct(){}

    const REGEX_ID = "#^[0-9]+$#";
    const REGEX_ASSIGN = "#^[\w]+".Raw::ASSIGNMENT.".*$#";
    const REGEX_EXTRA = "#^([\w]+".Raw::ASSIGNMENT.".*".Raw::DELIMITER.")*([\w]+".Raw::ASSIGNMENT.".*)?$#";
    const REGEX_MEMBRE = "#^([0-9]+".Raw::ASSIGNMENT."[0-9]".Raw::DELIMITER.")*([0-9]+".Raw::ASSIGNMENT."[0-9])$#";
    const REGEX_CLE = "#^[a-zA-Z0-9]{32}$#";
    const REGEX_ACTIVE = "#^[0-9]{1}$#";
    const REGEX_CREATION = "#^[0-9]{1,}$#";
    const REGEX_PSEUDO = "#^[a-z0-9_]{1,20}$#";
    const REGEX_EMAIL = "#^[a-z0-9-_.]{2,}@[a-z]+\.[a-z]{2,}$#";
    const REGEX_NAME_GROUP = "#^[A-Z]{1}[a-z]{0,}$#";
    const REGEX_NAME_POINT = "#^[A-Z]{2}[0-9]{1}[0-9A-F]{2}[0-9]{9}[A-Z]{2}$#";
}
