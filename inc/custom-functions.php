<?php
// Custom helper functions for the theme

/**
 * Show a small admin notice when changelog automation is present in the theme repo
 * - Visible to administrators only
 * - Detects presence of the workflow file at `/.github/workflows/update-changelog.yml`
 */
function gr333_changelog_automation_notice() {
	if ( ! function_exists( 'current_user_can' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$theme_dir = get_template_directory();
	$workflow_path = $theme_dir . '/.github/workflows/update-changelog.yml';
	$changelog_path = $theme_dir . '/CHANGELOG.md';

	if ( file_exists( $workflow_path ) ) {
		$changelog_label = file_exists( $changelog_path ) ? 'CHANGELOG.md' : 'changelog';

		// Build theme editor link
		$theme_slug = wp_get_theme()->get_stylesheet();
		$editor_url = admin_url( 'theme-editor.php?file=' . rawurlencode( 'CHANGELOG.md' ) . '&theme=' . rawurlencode( $theme_slug ) );

		// Try to detect GitHub repo URL from .git/config if present
		$github_url = '';
		$git_config = $theme_dir . '/.git/config';
		if ( file_exists( $git_config ) && is_readable( $git_config ) ) {
			$cfg = file_get_contents( $git_config );
			if ( preg_match('/url\s*=\s*(.+)\\r?\\n/', $cfg, $m) ) {
				$remote = trim( $m[1] );
				// Convert git@github.com:owner/repo.git -> https://github.com/owner/repo
				if ( strpos( $remote, 'git@github.com:' ) === 0 ) {
					$path = substr( $remote, strlen( 'git@github.com:' ) );
					$path = preg_replace('/\.git$/', '', $path);
					$github_url = 'https://github.com/' . $path . '/blob/main/CHANGELOG.md';
				} elseif ( preg_match('#https?://github.com/(.+?)(?:\.git)?$#', $remote, $m2) ) {
					$path = rtrim( $m2[1], "/\n\r" );
					$path = preg_replace('/\.git$/', '', $path);
					$github_url = 'https://github.com/' . $path . '/blob/main/CHANGELOG.md';
				}
			}
		}

		// Build message with links
		$message  = sprintf( 'Changelog automation detected: GitHub Actions will update <code>%s</code>.', esc_html( $changelog_label ) );
		$message .= ' ';
		$message .= sprintf( '<a href="%s">Edit changelog</a>', esc_url( $editor_url ) );
		if ( $github_url ) {
			$message .= ' &nbsp;|&nbsp; ';
			$message .= sprintf( '<a href="%s" target="_blank" rel="noopener">View on GitHub</a>', esc_url( $github_url ) );
		}

		echo '<div class="notice notice-success is-dismissible"><p>' . $message . '</p></div>';
	}
}
add_action( 'admin_notices', 'gr333_changelog_automation_notice' );

