<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright 2001 - 2014 Ampache.org
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */
$media = Video::create_from_id($media->id);
$media->format();
?>
<div class="np_group" id="np_group_1">
    <div class="np_cell cel_username">
        <label><?php echo T_('Username'); ?></label>
        <a title="<?php echo scrub_out($agent); ?>" href="<?php echo $web_path; ?>/stats.php?action=show_user&user_id=<?php echo $np_user->id; ?>">
        <?php echo scrub_out($np_user->fullname); ?>
<?php
        if ($np_user->f_avatar_medium) {
            echo '<div>' . $np_user->f_avatar_medium . '</div>';
        }
?>
        </a>
    </div>
</div>

<div class="np_group" id="np_group_2">
    <div class="np_cell cel_video">
        <label><?php echo T_('Video'); ?></label>
        <?php echo $media->f_link; ?>
    </div>
</div>

<?php if (Art::is_enabled()) { ?>
<div class="np_group" id="np_group_3">
  <div class="np_cell cel_albumart">
    <?php
        $release_art = $media->get_release_item_art();
        Art::display($release_art['object_type'], $release_art['object_id'], $media->get_fullname(), 6, $media->link);
    ?>
  </div>
</div>
<?php } ?>

<div class="np_group" id="np_group_4">
<?php if (AmpConfig::get('ratings')) { ?>
    <div class="np_cell cel_rating">
        <label><?php echo T_('Rating'); ?></label>
        <div id="rating_<?php echo $media->id; ?>_video">
            <?php Rating::show($media->id, 'video'); ?>
        </div>
    </div>
    <div class="np_cell cel_userflag">
        <label><?php echo T_('Fav.'); ?></label>
        <div id="userflag_<?php echo $media->id; ?>_video">
            <?php Userflag::show($media->id,'video'); ?>
        </div>
    </div>
<?php } ?>
</div>
