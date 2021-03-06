<?php
function directory_theme_entry_meta($text_class = '') {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post mr-2">%s</span>', __( 'Featured', 'directory-starter' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format mr-2">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'directory-starter' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated timeago '.$text_class .'" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on mr-2"><i class="far fa-file-alt"></i> <span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted', 'Used before publish date.', 'directory-starter' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline mr-2"><i class="fas fa-user-alt"></i> <span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( 'Author', 'Used before post author name.', 'directory-starter' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'directory-starter' ) );
		$categories_list = $text_class ? str_replace(" href=","class='$text_class' href=",$categories_list) : '';
		if ( $categories_list ) {
			printf( '<span class="cat-links mr-2 '.$text_class .'"><i class="fas fa-folder-open"></i> <span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'directory-starter' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'directory-starter' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links mr-2"><i class="fas fa-tag"></i> <span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'directory-starter' ),
				$tags_list
			);
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link mr-2 '.$text_class.'"><i class="fas fa-comment"></i> ';
		comments_popup_link( __( 'Leave a comment', 'directory-starter' ), __( '1 Comment', 'directory-starter' ), __( '% Comments', 'directory-starter' ),$text_class );
		echo '</span>';
	}
}

/**
 * Adds a responsive embed wrapper around oEmbed content
 * @param  string $html The oEmbed markup
 * @param  string $url  The URL being embedded
 * @param  array  $attr An array of attributes
 * @return string       Updated embed markup
 */
function dt_responsive_embed($html, $url, $attr) {
	return $html !== '' ? '<div class="embed-container">' . $html . '</div>' : '';
}