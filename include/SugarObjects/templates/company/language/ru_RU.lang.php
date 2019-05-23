<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2019 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$mod_strings = array(
    'ERR_DELETE_RECORD' => 'Вы должны указать номер записи перед удалением.',
    'LBL_ACCOUNT_NAME' => 'Контрагент:',
    'LBL_ACCOUNT' => 'Контрагент:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Мероприятия',
    'LBL_ADDRESS_INFORMATION' => 'Адресная информация',
    'LBL_ANNUAL_REVENUE' => 'Годовой доход:',
    'LBL_ANY_ADDRESS' => 'Любой адрес:',
    'LBL_ANY_EMAIL' => 'Любой E-mail:',
    'LBL_EMAIL_NON_PRIMARY' => 'Доп. E-mail',
    'LBL_ANY_PHONE' => 'Любой тел.:',
    'LBL_ASSIGNED_TO_NAME' => 'Пользователь:',
    'LBL_RATING' => 'Рейтинг:',
    'LBL_ASSIGNED_TO' => 'Ответственный(ая):',
    'LBL_ASSIGNED_USER' => 'Ответственный(ая):',
    'LBL_ASSIGNED_TO_ID' => 'Ответственный(ая)',
    'LBL_BILLING_ADDRESS_CITY' => 'Расчётный адрес - город:',
    'LBL_BILLING_ADDRESS_COUNTRY' => 'Расчётный адрес - страна:',
    'LBL_BILLING_ADDRESS_POSTALCODE' => 'Расчётный адрес - индекс:',
    'LBL_BILLING_ADDRESS_STATE' => 'Расчётный адрес - область:',
    'LBL_BILLING_ADDRESS_STREET_2' => 'Адрес получателя - улица 2',
    'LBL_BILLING_ADDRESS_STREET_3' => 'Адрес получателя - улица 3',
    'LBL_BILLING_ADDRESS_STREET_4' => 'Адрес получателя - улица 4',
    'LBL_BILLING_ADDRESS_STREET' => 'Расчётный адрес - улица:',
    'LBL_BILLING_ADDRESS' => 'Расчётный адрес',
    'LBL_ACCOUNT_INFORMATION' => 'Информация по контрагенту',
    'LBL_CITY' => 'Город:',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'Контакты',
    'LBL_COUNTRY' => 'Страна:',
    'LBL_DATE_ENTERED' => 'Дата создания:',
    'LBL_DATE_MODIFIED' => 'Дата изменения:',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'Контрагенты',
    'LBL_DESCRIPTION_INFORMATION' => 'Описание',
    'LBL_DESCRIPTION' => 'Описание:',
    'LBL_DUPLICATE' => 'Возможно дублирующий контрагент',
    'LBL_EMAIL' => 'E-mail:',
    'LBL_EMPLOYEES' => 'Сотрудники:',
    'LBL_FAX' => 'Факс:',
    'LBL_INDUSTRY' => 'Отрасль:',
    'LBL_LIST_ACCOUNT_NAME' => 'Контрагент',
    'LBL_LIST_CITY' => 'Город',
    'LBL_LIST_EMAIL_ADDRESS' => 'Адрес E-mail',
    'LBL_LIST_PHONE' => 'Тел.',
    'LBL_LIST_STATE' => 'Область:',
    'LBL_MEMBER_OF' => 'Состоит в:',
    'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'Членские организации',
    'LBL_NAME' => 'Название:',
    'LBL_OTHER_EMAIL_ADDRESS' => 'Другой E-mail:',
    'LBL_OTHER_PHONE' => 'Другой тел.:',
    'LBL_OWNERSHIP' => 'Собственность:',
    'LBL_PARENT_ACCOUNT_ID' => 'ID родительского контрагента',
    'LBL_PHONE_ALT' => 'Доп. тел.:',
    'LBL_PHONE_FAX' => 'Тел. (факс):',
    'LBL_PHONE_OFFICE' => 'Тел. (раб.):',
    'LBL_PHONE' => 'Тел.:',
    'LBL_EMAIL_ADDRESS' => 'E-mail',
    'LBL_EMAIL_ADDRESSES' => 'Адреса E-mail',
    'LBL_POSTAL_CODE' => 'Индекс:',
    'LBL_SAVE_ACCOUNT' => 'Сохранение контрагента',
    'LBL_SHIPPING_ADDRESS_CITY' => 'Отгрузочный адрес - город:',
    'LBL_SHIPPING_ADDRESS_COUNTRY' => 'Отгрузочный адрес - страна:',
    'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'Отгрузочный адрес - индекс:',
    'LBL_SHIPPING_ADDRESS_STATE' => 'Отгрузочный адрес - область:',
    'LBL_SHIPPING_ADDRESS_STREET_2' => 'Адрес отправителя - улица 2',
    'LBL_SHIPPING_ADDRESS_STREET_3' => 'Адрес отправителя - улица 3',
    'LBL_SHIPPING_ADDRESS_STREET_4' => 'Адрес отправителя - улица 4',
    'LBL_SHIPPING_ADDRESS_STREET' => 'Отгрузочный адрес - улица:',
    'LBL_SHIPPING_ADDRESS' => 'Отгрузочный адрес:',

    'LBL_STATE' => 'Область или регион:', //For address fields
    'LBL_TICKER_SYMBOL' => 'Биржевой код:',
    'LBL_TYPE' => 'Тип:',
    'LBL_WEBSITE' => 'Сайт:',

    'LNK_ACCOUNT_LIST' => 'Контрагенты',
    'LNK_NEW_ACCOUNT' => 'Создать контрагента',

    'MSG_DUPLICATE' => 'Создаваемая запись, возможно, дублирует уже существующего контрагента. Схожие записи приведены в списке.<br>Нажмите на кнопку <b>Создать контрагента</b> для создания новой записи или выберите существующую запись из списка.',
    'MSG_SHOW_DUPLICATES' => 'Создаваемая запись, возможно, дублирует уже существующего контрагента. Схожие записи приведены в списке.<br>Нажмите на кнопку <b>Сохранить</b> для создания новой записи или на кнопку <b>Отказаться</b> для возврата в модуль без создания новой записи.',

    'NTC_DELETE_CONFIRMATION' => 'Вы действительно хотите удалить эту запись?',

    'LBL_EDIT_BUTTON' => 'Править',
    'LBL_REMOVE' => 'Удалить',

);
