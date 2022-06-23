'use strict'

import '../theme-part/admin-part/subpages/main_banner/admin_main_banner';
import '../theme-part/admin-part/subpages/services/admin_services';
import '../theme-part/admin-part/subpages/green_rate/admin_green_rate';
import '../theme-part/admin-part/subpages/second_banner/admin_second_banner';
import '../theme-part/admin-part/subpages/our_clients/admin_our_clients';
import '../theme-part/admin-part/subpages/implementation_plan/admin_implementation_plan';
import '../theme-part/admin-part/subpages/footer/admin_footer';

// скрыть элементы админ бара
const word_press_link = document.querySelector("#wp-admin-bar-wp-logo");
word_press_link.style.display = 'none';
const update_link = document.querySelector("#wp-admin-bar-updates");
update_link.style.display = 'none';
const comment_link = document.querySelector("#wp-admin-bar-comments");
comment_link.style.display = 'none';
const add_sheet_link = document.querySelector("#wp-admin-bar-new-content");
add_sheet_link.style.display = 'none';
const user_name_link = document.querySelector("#wp-admin-bar-user-info");
user_name_link.style.display = 'none';
const edit_profile_link = document.querySelector("#wp-admin-bar-edit-profile");
edit_profile_link.style.display = 'none';


