<?php  $pid=get_the_id(); ?>
<ul class="sidenav sidenav-fixed" id="nav-mobile">
	<li class="bold<?=is_singular('page') ? ' active' : ''?>">
		<a class="collapsible-header">固定ページ</a>
		<div>
			<ul>
				<?php
					$query = new WP_Query(array(
						'post_type' => 'page'
					));
					while($query->have_posts()): $query->the_post();
				?>
					<li class="<?=$post->ID==$pid ? 'active' : ''?>"><a href="<?=get_the_permalink();?>" class="waves-effect"><?=get_the_title();?></a></li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
	</li>
	<?php foreach(get_terms('category') as $cat): ?>
		<li class="bold<?=in_category($cat->term_id) ? ' active' : ''?>">
			<a class="collapsible-header"><?=$cat->name?></a>
			<div>
				<ul>
					<?php
						$query = new WP_Query(array(
							'post_type' => 'any',
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field'  => 'term_taxonomy_id',
									'terms'  => $cat->term_id
								)
							)
						));
						while($query->have_posts()): $query->the_post();
					?>
						<li class="<?=$post->ID==$pid ? 'active' : ''?>"><a href="<?=get_the_permalink();?>" class="waves-effect"><?=get_the_title();?></a></li>
					<?php endwhile; wp_reset_postdata();?>
				</ul>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
