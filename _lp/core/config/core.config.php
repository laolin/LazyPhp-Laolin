<?php

$GLOBALS['config']['default_controller'] = 'default';
$GLOBALS['config']['default_action'] = 'index';
$GLOBALS['config']['default_language'] = 'zh_cn';

//����һ�������ڵ�controller�򲻴��ڵ�action��Ĭ�ϴ�������die̫ûǻ����
//��CROOT��Ĭ��һ���򵥵�err404 Controller
//app config������ض��壬Ȼ����AROOT�����Լ������ʲô���ֵ�Controller��action
$GLOBALS['config']['404_controller'] = 'err404';
$GLOBALS['config']['404_action'] = 'index404';
