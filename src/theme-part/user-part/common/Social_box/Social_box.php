<?php

class Social_box
{
    private function print($value): string
    {
        return print($value);
    }

    public function show(
        $instagram_link_href,
        $telegram_link_href,
        $whatsapp_link_href,
        $facebook_link_href,

        $instagram_img_src,
        $telegram_img_src,
        $whatsapp_img_src,
        $facebook_img_src,
        
        $instagram_link_class_name = null,
        $telegram_link_class_name = null,
        $whatsapp_link_class_name = null,
        $facebook_link_class_name = null,

        $instagram_img_class_name = null,
        $telegram_img_class_name = null,
        $whatsapp_img_class_name = null,
        $facebook_img_class_name = null,
        
        $list_class_name = null,
        $list_item_class_name = null): void
    {
?>
        <ul class="<?php $this->print($list_class_name) ?> social__list">
            <li class="<?php $this->print($list_item_class_name)?> social__list-item">
                <a href="<?php $this->print($instagram_link_href) ?>" class="<?php $this->print($instagram_link_class_name) ?> social__link instagram__link animated__fadein__1s">
                    <img src="<?php $this->print($instagram_img_src)?>" alt="instagram logo" class="<?php $this->print($instagram_img_class_name) ?> social__img instagram__img">
                </a>
            </li>
            <li class="<?php $this->print($list_item_class_name)?> social__list-item">
                <a href="https://t.me/<?php $this->print($telegram_link_href) ?>" class="<?php $this->print($telegram_link_class_name) ?> social__link telegram__link animated__fadein__1s">
                    <img src="<?php $this->print($telegram_img_src)?>" alt="telegram logo" class="<?php $this->print($telegram_img_class_name) ?> social__img telegram__img">
                </a>
            </li>
            <li class="<?php $this->print($list_item_class_name)?> social__list-item">
                <a href="https://wa.me/<?php $this->print($whatsapp_link_href) ?>" class="<?php $this->print($whatsapp_link_class_name) ?> social__link whatsapp__link animated__fadein__1s">
                    <img src="<?php $this->print($whatsapp_img_src)?>" alt="whatsapp logo" class="<?php $this->print($whatsapp_img_class_name) ?> social__img whatsapp__img">
                </a>
            </li>
            <li class="<?php $this->print($list_item_class_name)?> social__list-item">
                <a href="<?php $this->print($facebook_link_href) ?>" class="<?php $this->print($facebook_link_class_name) ?> social__link facebook__link animated__fadein__1s">
                    <img src="<?php $this->print($facebook_img_src)?>" alt="facebook logo" class="<?php $this->print($facebook_img_class_name) ?> social__img facebook__img">
                </a>
            </li>
        </ul>
<?php

    }
}


?>