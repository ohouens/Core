<?php
class Constant{
    private function __construct(){}

    const REGEX_ID = "/^[0-9]+$/";
    const REGEX_ASSIGN = "/^[\w]+:.*$/";
    const REGEX_EXTRA = "/^([\w]+:.*\|)*([\w]+:.*)?$/";
    const REGEX_MEMBRE = "/^([0-9]+:[0-9]\|)*([0-9]+:[0-9])$/";
    const REGEX_CLE = "/^[a-zA-Z0-9]{32}$/";
    const REGEX_ACTIVE = "/^[0-9]{1}$/";
    const REGEX_CREATION = "/^[0-9]{1,}$/";
    const REGEX_PSEUDO = "/^[a-z0-9_]{1,20}$/";
    const REGEX_EMAIL = "/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/";
    const REGEX_NAME_GROUP = "/^[A-Z]{1}[a-zA-Z]{0,}$/";
    const REGEX_NAME_POINT = "/^[A-Z]{2}[0-9]{1}[0-9A-F]{2}[0-9]{9}[A-Z]{2}$/";
    const REGEX_FORMAT_TITLE = "/^([\w&àâçéèêëîïôûùüÿñæœ]+['?. ]?){2,77}$/";

    const THREAD_FORUM = 0;
    const THREAD_FLUX = 1;
    const THREAD_TICKETING = 2;
    const THREAD_ANSWER = 3;

    const ERROR_CODE_OK = 0;
    const ERROR_CODE_NOT_FOUND = 44;
    const ERROR_CODE_PSEUDO_LENGTH = 20;
    const ERROR_CODE_PSEUDO_LOWER_CASE = 211;
    const ERROR_CODE_PSEUDO_EXTRA_FORMAT = 212;
    const ERROR_CODE_EMAIL_FORMAT = 22;
    const ERROR_CODE_PASSWORD_LENGTH = 23;
    const ERROR_CODE_PASSWORD_LOWER_CASE = 24;
    const ERROR_CODE_PASSWORD_UPPER_CASE = 25;
    const ERROR_CODE_PASSWORD_EXTRA_FORMAT = 26;
    const ERROR_CODE_USER_NOT_FOUND = 299;
    const ERROR_CODE_USER_WRONG = 27;
    const ERROR_CODE_USER_PASSWORD = 294;
    const ERROR_CODE_USER_TOKEN = 295;
    const ERROR_CODE_USER_NO_LICENCE = 28;
    const ERROR_CODE_THREAD_TITLE = 10;
    const ERROR_CODE_THREAD_LENGTH = 11;
    const ERROR_CODE_THREAD_DATE = 16;
    const ERROR_CODE_THREAD_WRITE_RIGHT = 17;
    const ERROR_CODE_FILE_UPLOAD = 701;
    const ERROR_CODE_FILE_LIMIT = 702;
    const ERROR_CODE_FILE_EXTENSION = 701;
    const ERROR_CODE_COUNTRY_FORMAT = 50;
    const ERROR_CODE_GENDER_FORMAT = 51;
    const ERROR_CODE_SOCIAL_FORMAT = 52;
    const ERROR_CODE_HOBBY_FORMAT = 53;
    const ERROR_CODE_INSTAGRAM_FORMAT = 54;
    const ERROR_CODE_LINKEDIN_FORMAT = 55;
}
