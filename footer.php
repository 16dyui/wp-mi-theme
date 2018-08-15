		</main>
		<noscript id="deferred-styles">
			<link rel="stylesheet" href="<?=get_template_directory_uri();?>/ext/mt.css">
			<link rel="stylesheet" href="<?=get_template_directory_uri();?>/ext/pr.css">
			<link rel="stylesheet" href="<?=get_template_directory_uri();?>/ext/mi.css">
			<link rel="stylesheet" href="<?=get_template_directory_uri();?>/style.css">
		</noscript>
		<script>
			var loadDeferredStyles = function() {
				var addStylesNode = document.getElementById("deferred-styles");
				var replacement = document.createElement("div");
				replacement.innerHTML = addStylesNode.textContent;
				document.body.appendChild(replacement)
				addStylesNode.parentElement.removeChild(addStylesNode);
			};
			var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
				window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
			if (raf) raf(function() {
				window.setTimeout(loadDeferredStyles, 0);
			});
			else window.addEventListener('load', loadDeferredStyles);
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
