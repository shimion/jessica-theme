<?php

add_filter( 'c5ab_premade_templates', 'c5ab_theme_premade_templates' );

function c5ab_theme_premade_templates($templates) {
	if (!is_array($templates)) {
		$templates =  array( );
	}

	$templates[] = array(
		'id'=> 'homepage-1',
		'name'=> 'Homepage Blog 1',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJzc0ZyQm0iO3M6NzoiZGVza3RvcCI7czoyOiIxMiI7czo2OiJ0YWJsZXQiO3M6MjoiMTIiO3M6NToicGhvbmUiO3M6MjoiMTIiO3M6NzoiY29udGVudCI7YToxOntpOjA7YToxMzp7czo0OiJ0eXBlIjtzOjc6ImVsZW1lbnQiO3M6MjoiaWQiO3M6NjoiTkF6RFJsIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6IlFpZnVEUSI7czoxMToiaGVscGVyX3RleHQiO3M6MDoiIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MTA6IkM1QUJfcG9zdHMiO3M6NzoiY29udGVudCI7YToxMjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czowOiIiO3M6MTE6InJlbmRlcl90eXBlIjtzOjY6ImJsb2ctMSI7czo2OiJmb2xsb3ciO3M6Mjoib24iO3M6MTQ6InBvc3RzX3Blcl9wYWdlIjtzOjE6IjgiO3M6OToicG9zdF90eXBlIjtzOjQ6InBvc3QiO3M6Nzoib3JkZXJieSI7czo0OiJkYXRlIjtzOjU6Im9yZGVyIjtzOjQ6IkRFU0MiO3M6NToicG9zdHMiO3M6MDoiIjtzOjY6InBhZ2luZyI7czo0OiJhamF4IjtzOjk6Im1ldGFfZGF0YSI7czo3NjoiY2F0ZWdvcnlfb24sYXV0aG9yX29uLHRpbWVfb24sY29tbWVudF9vbixsaWtlX29uLHZpZXdzX29uLHNoYXJlX29uLHJhdGluZ19vbiI7czoxNDoiYzVfZGF0ZV9mb3JtYXQiO3M6NDoiZGF0ZSI7fXM6OToiYW5pbWF0aW9uIjtzOjI6Im5vIjtzOjE1OiJhbmltYXRpb25fZGVsYXkiO3M6MToiMCI7czoxODoiYW5pbWF0aW9uX2R1cmF0aW9uIjtzOjQ6IjEwMDAiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9fXM6MjoiaWQiO3M6NjoiUWlmdURRIjt9fXM6MjoiaWQiO3M6Njoic3NGckJtIjt9fQ==',
	);

	$templates[] = array(
		'id'=> 'homepage-2',
		'name'=> 'Homepage Blog 2',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJzc0ZyQm0iO3M6NzoiZGVza3RvcCI7czoyOiIxMiI7czo2OiJ0YWJsZXQiO3M6MjoiMTIiO3M6NToicGhvbmUiO3M6MjoiMTIiO3M6NzoiY29udGVudCI7YToxOntpOjA7YToxMzp7czo0OiJ0eXBlIjtzOjc6ImVsZW1lbnQiO3M6MjoiaWQiO3M6NjoiTkF6RFJsIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6IlFpZnVEUSI7czoxMToiaGVscGVyX3RleHQiO3M6MDoiIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MTA6IkM1QUJfcG9zdHMiO3M6NzoiY29udGVudCI7YToxMjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czowOiIiO3M6MTE6InJlbmRlcl90eXBlIjtzOjY6ImJsb2ctMiI7czo2OiJmb2xsb3ciO3M6Mjoib24iO3M6MTQ6InBvc3RzX3Blcl9wYWdlIjtzOjI6IjEwIjtzOjk6InBvc3RfdHlwZSI7czo0OiJwb3N0IjtzOjc6Im9yZGVyYnkiO3M6NDoiZGF0ZSI7czo1OiJvcmRlciI7czo0OiJERVNDIjtzOjU6InBvc3RzIjtzOjA6IiI7czo2OiJwYWdpbmciO3M6Mjoib24iO3M6OToibWV0YV9kYXRhIjtzOjcwOiJhdXRob3Jfb2ZmLHRpbWVfb24sY29tbWVudF9vbixjYXRlZ29yeV9vZmYsbGlrZV9vbix2aWV3c19vbixyYXRpbmdfb2ZmIjtzOjE0OiJjNV9kYXRlX2Zvcm1hdCI7czo0OiJkYXRlIjt9czo5OiJhbmltYXRpb24iO3M6Mjoibm8iO3M6MTU6ImFuaW1hdGlvbl9kZWxheSI7czoxOiIwIjtzOjE4OiJhbmltYXRpb25fZHVyYXRpb24iO3M6NDoiMTAwMCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO319czoyOiJpZCI7czo2OiJRaWZ1RFEiO319czoyOiJpZCI7czo2OiJzc0ZyQm0iO319',
	);
	$templates[] = array(
		'id'=> 'homepage-3',
		'name'=> 'Homepage Grid 1',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJzc0ZyQm0iO3M6NzoiZGVza3RvcCI7czoyOiIxMiI7czo2OiJ0YWJsZXQiO3M6MjoiMTIiO3M6NToicGhvbmUiO3M6MjoiMTIiO3M6NzoiY29udGVudCI7YToxOntpOjA7YToxMzp7czo0OiJ0eXBlIjtzOjc6ImVsZW1lbnQiO3M6MjoiaWQiO3M6NjoiTkF6RFJsIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6IlFpZnVEUSI7czoxMToiaGVscGVyX3RleHQiO3M6MDoiIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MTA6IkM1QUJfcG9zdHMiO3M6NzoiY29udGVudCI7YToxMjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czowOiIiO3M6MTE6InJlbmRlcl90eXBlIjtzOjY6ImdyaWQtMSI7czo2OiJmb2xsb3ciO3M6Mjoib24iO3M6MTQ6InBvc3RzX3Blcl9wYWdlIjtzOjE6IjkiO3M6OToicG9zdF90eXBlIjtzOjQ6InBvc3QiO3M6Nzoib3JkZXJieSI7czo0OiJkYXRlIjtzOjU6Im9yZGVyIjtzOjQ6IkRFU0MiO3M6NToicG9zdHMiO3M6MDoiIjtzOjY6InBhZ2luZyI7czo0OiJhamF4IjtzOjk6Im1ldGFfZGF0YSI7czo4MToiYXV0aG9yX29mZix0aW1lX29mZixjYXRlZ29yeV9vbixjb21tZW50X29uLGxpa2Vfb24sdmlld3Nfb2ZmLHNoYXJlX29mZixyYXRpbmdfb2ZmIjtzOjE0OiJjNV9kYXRlX2Zvcm1hdCI7czo0OiJkYXRlIjt9czo5OiJhbmltYXRpb24iO3M6Mjoibm8iO3M6MTU6ImFuaW1hdGlvbl9kZWxheSI7czoxOiIwIjtzOjE4OiJhbmltYXRpb25fZHVyYXRpb24iO3M6NDoiMTAwMCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO319czoyOiJpZCI7czo2OiJRaWZ1RFEiO319czoyOiJpZCI7czo2OiJzc0ZyQm0iO319',
	);
	$templates[] = array(
		'id'=> 'homepage-4',
		'name'=> 'Homepage Grid 2',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6MTg6e3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjtzOjEyOiJjdXN0b21fY2xhc3MiO3M6MDoiIjtzOjEwOiJmdWxsX3dpZHRoIjtzOjM6Im9mZiI7czo5OiJyb3dfd2lkdGgiO3M6NzoiZGVmYXVsdCI7czoxMjoiY3VzdG9tX3dpZHRoIjtzOjM6Ijk5OSI7czo1OiJhbGlnbiI7czo0OiJsZWZ0IjtzOjY6Im1hcmdpbiI7czoyOiIzMCI7czoyMDoidmlkZW9fYmFja2dyb3VuZF9tcDQiO3M6MDoiIjtzOjIwOiJ2aWRlb19iYWNrZ3JvdW5kX29nZyI7czowOiIiO3M6MjE6InZpZGVvX2JhY2tncm91bmRfd2VibSI7czowOiIiO3M6MTA6ImJhY2tncm91bmQiO3M6MjY4OiJZVG8yT250ek9qRTJPaUppWVdOclozSnZkVzVrTFdOdmJHOXlJanR6T2pBNklpSTdjem94TnpvaVltRmphMmR5YjNWdVpDMXlaWEJsWVhRaU8zTTZNRG9pSWp0ek9qSXhPaUppWVdOclozSnZkVzVrTFdGMGRHRmphRzFsYm5RaU8zTTZNRG9pSWp0ek9qRTVPaUppWVdOclozSnZkVzVrTFhCdmMybDBhVzl1SWp0ek9qQTZJaUk3Y3pveE5Ub2lZbUZqYTJkeWIzVnVaQzF6YVhwbElqdHpPakE2SWlJN2N6b3hOam9pWW1GamEyZHliM1Z1WkMxcGJXRm5aU0k3Y3pvd09pSWlPMzA9IjtzOjc6ImJnX21vZGUiO3M6MTA6ImxpZ2h0LW1vZGUiO3M6MTQ6InJvd19tYXJnaW5fdG9wIjtzOjA6IiI7czoxNzoicm93X21hcmdpbl9ib3R0b20iO3M6MDoiIjtzOjE1OiJyb3dfcGFkZGluZ190b3AiO3M6MDoiIjtzOjE4OiJyb3dfcGFkZGluZ19ib3R0b20iO3M6MDoiIjt9czo3OiJjb250ZW50IjthOjE6e2k6MDthOjg6e3M6NDoidHlwZSI7czo2OiJsYXlvdXQiO3M6NToib3JkZXIiO3M6MToiMCI7czo2OiJwYXJlbnQiO3M6NjoiaEhDWFNVIjtzOjc6ImRlc2t0b3AiO3M6MjoiMTIiO3M6NjoidGFibGV0IjtzOjI6IjEyIjtzOjU6InBob25lIjtzOjI6IjEyIjtzOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6MTM6e3M6NDoidHlwZSI7czo3OiJlbGVtZW50IjtzOjI6ImlkIjtzOjY6IlhUek1aViI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJYWk5EV1kiO3M6MTE6ImhlbHBlcl90ZXh0IjtzOjA6IiI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjEwOiJDNUFCX3Bvc3RzIjtzOjc6ImNvbnRlbnQiO2E6MTI6e3M6MTU6ImM1X2hlbHBlcl90aXRsZSI7czowOiIiO3M6ODoiYzVfdGl0bGUiO3M6MDoiIjtzOjExOiJyZW5kZXJfdHlwZSI7czo2OiJncmlkLTIiO3M6NjoiZm9sbG93IjtzOjI6Im9uIjtzOjE0OiJwb3N0c19wZXJfcGFnZSI7czoxOiI5IjtzOjk6InBvc3RfdHlwZSI7czo0OiJwb3N0IjtzOjc6Im9yZGVyYnkiO3M6NDoiZGF0ZSI7czo1OiJvcmRlciI7czo0OiJERVNDIjtzOjU6InBvc3RzIjtzOjA6IiI7czo2OiJwYWdpbmciO3M6Mjoib24iO3M6OToibWV0YV9kYXRhIjtzOjgwOiJhdXRob3Jfb24sdGltZV9vZmYsY2F0ZWdvcnlfb2ZmLGNvbW1lbnRfb24sbGlrZV9vbix2aWV3c19vZmYsc2hhcmVfb24scmF0aW5nX29mZiI7czoxNDoiYzVfZGF0ZV9mb3JtYXQiO3M6NDoiZGF0ZSI7fXM6OToiYW5pbWF0aW9uIjtzOjI6Im5vIjtzOjE1OiJhbmltYXRpb25fZGVsYXkiO3M6MToiMCI7czoxODoiYW5pbWF0aW9uX2R1cmF0aW9uIjtzOjQ6IjEwMDAiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9fXM6MjoiaWQiO3M6NjoiWFpORFdZIjt9fXM6MjoiaWQiO3M6NjoiaEhDWFNVIjt9fQ==',
	);
	$templates[] = array(
		'id'=> 'homepage-5',
		'name'=> 'Homepage Grid 3',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJZd0F0UVUiO3M6NzoiZGVza3RvcCI7czoyOiIxMiI7czo2OiJ0YWJsZXQiO3M6MjoiMTIiO3M6NToicGhvbmUiO3M6MjoiMTIiO3M6NzoiY29udGVudCI7YToxOntpOjA7YToxMzp7czo0OiJ0eXBlIjtzOjc6ImVsZW1lbnQiO3M6MjoiaWQiO3M6NjoiRXZJbGNSIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6IlVUeFJJcCI7czoxMToiaGVscGVyX3RleHQiO3M6MDoiIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MTA6IkM1QUJfcG9zdHMiO3M6NzoiY29udGVudCI7YToxMjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czowOiIiO3M6MTE6InJlbmRlcl90eXBlIjtzOjY6ImdyaWQtMyI7czo2OiJmb2xsb3ciO3M6Mjoib24iO3M6MTQ6InBvc3RzX3Blcl9wYWdlIjtzOjE6IjkiO3M6OToicG9zdF90eXBlIjtzOjQ6InBvc3QiO3M6Nzoib3JkZXJieSI7czo0OiJkYXRlIjtzOjU6Im9yZGVyIjtzOjQ6IkRFU0MiO3M6NToicG9zdHMiO3M6MDoiIjtzOjY6InBhZ2luZyI7czoyOiJvbiI7czo5OiJtZXRhX2RhdGEiO3M6ODA6ImF1dGhvcl9vZmYsdGltZV9vbixjYXRlZ29yeV9vZmYsY29tbWVudF9vbixsaWtlX29uLHZpZXdzX29mZixzaGFyZV9vbixyYXRpbmdfb2ZmIjtzOjE0OiJjNV9kYXRlX2Zvcm1hdCI7czo0OiJkYXRlIjt9czo5OiJhbmltYXRpb24iO3M6Mjoibm8iO3M6MTU6ImFuaW1hdGlvbl9kZWxheSI7czoxOiIwIjtzOjE4OiJhbmltYXRpb25fZHVyYXRpb24iO3M6NDoiMTAwMCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO319czoyOiJpZCI7czo2OiJVVHhSSXAiO319czoyOiJpZCI7czo2OiJZd0F0UVUiO319',
	);


	$templates[] = array(
		'id'=> 'contact',
		'name'=> 'Contact',
		'content'=> 'YToyOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6Mjp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJPT09ERmwiO3M6NzoiZGVza3RvcCI7czoxOiI2IjtzOjY6InRhYmxldCI7czoxOiI2IjtzOjU6InBob25lIjtzOjI6IjEyIjtzOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6MTM6e3M6NDoidHlwZSI7czo3OiJlbGVtZW50IjtzOjI6ImlkIjtzOjEwOiJxZ1dKS1N4cWhMIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6Inl5aEFDaSI7czoxMToiaGVscGVyX3RleHQiO3M6MjI6Ik15IENvbnRhY3QgaW5mb3JtYXRpb24iO3M6MTI6IndpZGdldF9jbGFzcyI7czo3OiJDNUFCX3VsIjtzOjc6ImNvbnRlbnQiO2E6Mzp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czoyMjoiTXkgQ29udGFjdCBpbmZvcm1hdGlvbiI7czo3OiJjNWFiX2xpIjtzOjQxNjoiWVRveU9udHBPakE3WVRvME9udHpPalU2SW5ScGRHeGxJanR6T2pVNklsQm9iMjVsSWp0ek9qUTZJbWxqYjI0aU8zTTZNVEU2SW1aaElHWmhMWEJvYjI1bElqdHpPalU2SW1OdmJHOXlJanR6T2pjNklpTmpOREUwTVRFaU8zTTZOem9pWTI5dWRHVnVkQ0k3Y3pvek56b2lQSE4wY205dVp6NVFhRzl1WlRvOEwzTjBjbTl1Wno0Z0t6RXlNeTAwTlRZdE56ZzVNQ0k3ZldrNk1UdGhPalE2ZTNNNk5Ub2lkR2wwYkdVaU8zTTZOVG9pUlcxaGFXd2lPM002TkRvaWFXTnZiaUk3Y3pveE5qb2labUVnWm1FdFpXNTJaV3h2Y0dVdGJ5STdjem8xT2lKamIyeHZjaUk3Y3pvM09pSWpZelF4TkRFeElqdHpPamM2SW1OdmJuUmxiblFpTzNNNk16azZJanh6ZEhKdmJtYytSVzFoYVd3NlBDOXpkSEp2Ym1jK2FXNW1iMEJqYjJSbE1USTFMbU52YlNJN2ZYMD0iO31zOjk6ImFuaW1hdGlvbiI7czoyOiJubyI7czoxNToiYW5pbWF0aW9uX2RlbGF5IjtzOjE6IjAiO3M6MTg6ImFuaW1hdGlvbl9kdXJhdGlvbiI7czo0OiIxMDAwIjtzOjc6ImRlc2t0b3AiO3M6NDoiVFJVRSI7czo2OiJ0YWJsZXQiO3M6NDoiVFJVRSI7czo2OiJtb2JpbGUiO3M6NDoiVFJVRSI7fX1zOjI6ImlkIjtzOjY6Inl5aEFDaSI7fWk6MTthOjg6e3M6NDoidHlwZSI7czo2OiJsYXlvdXQiO3M6NToib3JkZXIiO3M6MToiMSI7czo2OiJwYXJlbnQiO3M6NjoiT09PREZsIjtzOjc6ImRlc2t0b3AiO3M6MToiNiI7czo2OiJ0YWJsZXQiO3M6MToiNiI7czo1OiJwaG9uZSI7czoyOiIxMiI7czo3OiJjb250ZW50IjthOjI6e2k6MDthOjEzOntzOjQ6InR5cGUiO3M6NzoiZWxlbWVudCI7czoyOiJpZCI7czo2OiJ3QXJReEoiO3M6NToib3JkZXIiO3M6MToiMCI7czo2OiJwYXJlbnQiO3M6Njoic053cWlsIjtzOjExOiJoZWxwZXJfdGV4dCI7czoyOiI1MCI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjEwOiJDNUFCX3NwYWNlIjtzOjc6ImNvbnRlbnQiO2E6Mjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo2OiJoZWlnaHQiO3M6MjoiNTAiO31zOjk6ImFuaW1hdGlvbiI7czoyOiJubyI7czoxNToiYW5pbWF0aW9uX2RlbGF5IjtzOjE6IjAiO3M6MTg6ImFuaW1hdGlvbl9kdXJhdGlvbiI7czo0OiIxMDAwIjtzOjc6ImRlc2t0b3AiO3M6NDoiVFJVRSI7czo2OiJ0YWJsZXQiO3M6NDoiVFJVRSI7czo2OiJtb2JpbGUiO3M6NDoiVFJVRSI7fWk6MTthOjEzOntzOjQ6InR5cGUiO3M6NzoiZWxlbWVudCI7czoyOiJpZCI7czo2OiJxZ1dKS1MiO3M6NToib3JkZXIiO3M6MToiMSI7czo2OiJwYXJlbnQiO3M6Njoic053cWlsIjtzOjExOiJoZWxwZXJfdGV4dCI7czowOiIiO3M6MTI6IndpZGdldF9jbGFzcyI7czo3OiJDNUFCX3VsIjtzOjc6ImNvbnRlbnQiO2E6Mzp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo4OiJjNV90aXRsZSI7czowOiIiO3M6NzoiYzVhYl9saSI7czo0MzI6IllUb3lPbnRwT2pJN1lUbzBPbnR6T2pVNkluUnBkR3hsSWp0ek9qZzZJa3h2WTJGMGFXOXVJanR6T2pRNkltbGpiMjRpTzNNNk1qQTZJbVpoSUdaaExXeHZZMkYwYVc5dUxXRnljbTkzSWp0ek9qVTZJbU52Ykc5eUlqdHpPamM2SWlOak5ERTBNVEVpTzNNNk56b2lZMjl1ZEdWdWRDSTdjem8wTXpvaVBITjBjbTl1Wno1QlpISmxjM05sT2p3dmMzUnliMjVuUGlCQmJHVjRZVzVrY21saExDQkZaM2x3ZENJN2ZXazZNenRoT2pRNmUzTTZOVG9pZEdsMGJHVWlPM002TlRvaVUydDVjR1VpTzNNNk5Eb2lhV052YmlJN2N6b3hNVG9pWm1FZ1ptRXRjMnQ1Y0dVaU8zTTZOVG9pWTI5c2IzSWlPM002TnpvaUl6QXdZV05sWkNJN2N6bzNPaUpqYjI1MFpXNTBJanR6T2pNNE9pSThjM1J5YjI1blBsTnJlWEJsT2lBOEwzTjBjbTl1Wno0Z2MydDVjR1YxYzJWeWJtRnRaU0k3ZlgwPSI7fXM6OToiYW5pbWF0aW9uIjtzOjI6Im5vIjtzOjE1OiJhbmltYXRpb25fZGVsYXkiO3M6MToiMCI7czoxODoiYW5pbWF0aW9uX2R1cmF0aW9uIjtzOjQ6IjEwMDAiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9fXM6MjoiaWQiO3M6Njoic053cWlsIjt9fXM6MjoiaWQiO3M6NjoiT09PREZsIjt9aToxO2E6Njp7czo0OiJ0eXBlIjtzOjM6InJvdyI7czo1OiJvcmRlciI7czoxOiIxIjtzOjY6InBhcmVudCI7czoxOiIwIjtzOjg6InNldHRpbmdzIjthOjY6e3M6NjoibWFyZ2luIjtpOjMwO3M6MTA6ImZ1bGxfd2lkdGgiO3M6Mzoib2ZmIjtzOjU6ImFsaWduIjtzOjQ6ImxlZnQiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9czo3OiJjb250ZW50IjthOjE6e2k6MDthOjg6e3M6NDoidHlwZSI7czo2OiJsYXlvdXQiO3M6NToib3JkZXIiO3M6MToiMCI7czo2OiJwYXJlbnQiO3M6NjoibHFWSkljIjtzOjc6ImRlc2t0b3AiO3M6MjoiMTIiO3M6NjoidGFibGV0IjtzOjI6IjEyIjtzOjU6InBob25lIjtzOjI6IjEyIjtzOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6MTM6e3M6NDoidHlwZSI7czo3OiJlbGVtZW50IjtzOjI6ImlkIjtzOjY6ImpJWVVBUCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJSeGZLVVIiO3M6MTE6ImhlbHBlcl90ZXh0IjtzOjE3OiJTZW5kIG1lIGEgbWVzc2FnZSI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjE3OiJDNUFCX2NvbnRhY3RfZm9ybSI7czo3OiJjb250ZW50IjthOjk6e3M6MTU6ImM1X2hlbHBlcl90aXRsZSI7czowOiIiO3M6ODoiYzVfdGl0bGUiO3M6MTc6IlNlbmQgbWUgYSBtZXNzYWdlIjtzOjU6ImVtYWlsIjtzOjI3OiJtb3N0YWZhLm1hYnJvdWtAY29kZTEyNS5jb20iO3M6NDoibmFtZSI7czo0OiJOYW1lIjtzOjEwOiJ5b3VyX2VtYWlsIjtzOjU6IkVtYWlsIjtzOjc6Im1lc3NhZ2UiO3M6MTY6IllvdXIgbWVzc2FnZSAuLi4iO3M6NDoic2VuZCI7czo0OiJTZW5kIjtzOjc6InN1Y2Nlc3MiO3M6MzM6IllvdXIgTWVzc2FnZSB3YXMgc2VudCwgVGhhbmsgeW91LiI7czo0OiJmYWlsIjtzOjQ0OiJZb3VyIE1lc3NhZ2Ugd2FzIG5vdCBzZW50LCBQbGVhc2UgdHJ5IGFnYWluLiI7fXM6OToiYW5pbWF0aW9uIjtzOjI6Im5vIjtzOjE1OiJhbmltYXRpb25fZGVsYXkiO3M6MToiMCI7czoxODoiYW5pbWF0aW9uX2R1cmF0aW9uIjtzOjQ6IjEwMDAiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9fXM6MjoiaWQiO3M6NjoiUnhmS1VSIjt9fXM6MjoiaWQiO3M6NjoibHFWSkljIjt9fQ==',
	);




	$templates[] = array(
		'id'=> 'footer-1',
		'name'=> 'Footer',
		'content'=> 'YToxOntpOjA7YTo2OntzOjQ6InR5cGUiO3M6Mzoicm93IjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjE6IjAiO3M6ODoic2V0dGluZ3MiO2E6Njp7czo2OiJtYXJnaW4iO2k6MzA7czoxMDoiZnVsbF93aWR0aCI7czozOiJvZmYiO3M6NToiYWxpZ24iO3M6NDoibGVmdCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO31zOjc6ImNvbnRlbnQiO2E6NDp7aTowO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJBYVJzV08iO3M6NzoiZGVza3RvcCI7czoxOiIzIjtzOjY6InRhYmxldCI7czoxOiIzIjtzOjU6InBob25lIjtzOjI6IjEyIjtzOjc6ImNvbnRlbnQiO2E6Mzp7aTowO2E6MTM6e3M6NDoidHlwZSI7czo3OiJlbGVtZW50IjtzOjI6ImlkIjtzOjY6IlR4cVBNUyI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJKRkZtamQiO3M6MTE6ImhlbHBlcl90ZXh0IjtzOjA6IiI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjEwOiJDNUFCX2ltYWdlIjtzOjc6ImNvbnRlbnQiO2E6MTA6e3M6MTU6ImM1X2hlbHBlcl90aXRsZSI7czowOiIiO3M6ODoiYzVfdGl0bGUiO3M6MDoiIjtzOjM6InVybCI7czoyMToiaHR0cHM6Ly9kLnByL2kvMTNZSzArIjtzOjU6ImNsYXNzIjtzOjA6IiI7czo1OiJ3aWR0aCI7czozOiIxMjAiO3M6NjoiaGVpZ2h0IjtzOjQ6Ijk5OTkiO3M6NDoibGluayI7czowOiIiO3M6NzoiY2FwdGlvbiI7czowOiIiO3M6NDoidHlwZSI7czo0OiJub25lIjtzOjU6ImFsaWduIjtzOjQ6ImxlZnQiO31zOjk6ImFuaW1hdGlvbiI7czoyOiJubyI7czoxNToiYW5pbWF0aW9uX2RlbGF5IjtzOjE6IjAiO3M6MTg6ImFuaW1hdGlvbl9kdXJhdGlvbiI7czo0OiIxMDAwIjtzOjc6ImRlc2t0b3AiO3M6NDoiVFJVRSI7czo2OiJ0YWJsZXQiO3M6NDoiVFJVRSI7czo2OiJtb2JpbGUiO3M6NDoiVFJVRSI7fWk6MTthOjEzOntzOjQ6InR5cGUiO3M6NzoiZWxlbWVudCI7czoyOiJpZCI7czo2OiJST3NmY0wiO3M6NToib3JkZXIiO3M6MToiMSI7czo2OiJwYXJlbnQiO3M6NjoiSkZGbWpkIjtzOjExOiJoZWxwZXJfdGV4dCI7czoyOiIyNSI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjEwOiJDNUFCX3NwYWNlIjtzOjc6ImNvbnRlbnQiO2E6Mjp7czoxNToiYzVfaGVscGVyX3RpdGxlIjtzOjA6IiI7czo2OiJoZWlnaHQiO3M6MjoiMjUiO31zOjk6ImFuaW1hdGlvbiI7czoyOiJubyI7czoxNToiYW5pbWF0aW9uX2RlbGF5IjtzOjE6IjAiO3M6MTg6ImFuaW1hdGlvbl9kdXJhdGlvbiI7czo0OiIxMDAwIjtzOjc6ImRlc2t0b3AiO3M6NDoiVFJVRSI7czo2OiJ0YWJsZXQiO3M6NDoiVFJVRSI7czo2OiJtb2JpbGUiO3M6NDoiVFJVRSI7fWk6MjthOjEzOntzOjQ6InR5cGUiO3M6NzoiZWxlbWVudCI7czoyOiJpZCI7czo2OiJXeXpGamMiO3M6NToib3JkZXIiO3M6MToiMiI7czo2OiJwYXJlbnQiO3M6NjoiSkZGbWpkIjtzOjExOiJoZWxwZXJfdGV4dCI7czowOiIiO3M6MTI6IndpZGdldF9jbGFzcyI7czo5OiJDNUFCX3RleHQiO3M6NzoiY29udGVudCI7YTozOntzOjE1OiJjNV9oZWxwZXJfdGl0bGUiO3M6MDoiIjtzOjg6ImM1X3RpdGxlIjtzOjA6IiI7czo3OiJjb250ZW50IjtzOjI3MjoiQ3J5c3RhbCBpcyBhIHBlcnNvbmFsIGJsb2cgYW5kIG1hZ2F6aW5lIFdvcmRQcmVzcyB0aGVtZSB0aGF0IGxldHMgeW91IHByZXNlbnQgeW91ciB0aG91Z2h0cyBhbmQgaW5mb3JtYXRpb24gaW4gYW4gZWxlZ2FudCB3YXkuPGJyLz48YnIvPg0KDQpTdGFydCBCdWlsZGluZyB5b3VyIHdlYnNpdGUgaW4gZmV3IG1pbnV0ZXMgYW5kIGdldCB0aGUgc3VwcG9ydCBvZiByZXRpbmEsIHJlc3BvbnNpdmUsIHJ0bCBhbmQgV1BNTCBhbmQgbXVjaCBtb3JlIGF0IHlvdXIgZmluZ2VyIHRpcC4iO31zOjk6ImFuaW1hdGlvbiI7czoyOiJubyI7czoxNToiYW5pbWF0aW9uX2RlbGF5IjtzOjE6IjAiO3M6MTg6ImFuaW1hdGlvbl9kdXJhdGlvbiI7czo0OiIxMDAwIjtzOjc6ImRlc2t0b3AiO3M6NDoiVFJVRSI7czo2OiJ0YWJsZXQiO3M6NDoiVFJVRSI7czo2OiJtb2JpbGUiO3M6NDoiVFJVRSI7fX1zOjI6ImlkIjtzOjY6IkpGRm1qZCI7fWk6MTthOjg6e3M6NDoidHlwZSI7czo2OiJsYXlvdXQiO3M6NToib3JkZXIiO3M6MToiMSI7czo2OiJwYXJlbnQiO3M6NjoiQWFSc1dPIjtzOjc6ImRlc2t0b3AiO3M6MToiMyI7czo2OiJ0YWJsZXQiO3M6MToiMyI7czo1OiJwaG9uZSI7czoyOiIxMiI7czo3OiJjb250ZW50IjthOjE6e2k6MDthOjEzOntzOjQ6InR5cGUiO3M6NzoiZWxlbWVudCI7czoyOiJpZCI7czo2OiJOU2hXTHMiO3M6NToib3JkZXIiO3M6MToiMCI7czo2OiJwYXJlbnQiO3M6NjoiaWJXV3RGIjtzOjExOiJoZWxwZXJfdGV4dCI7czoxMjoiUmVjZW50IFBvc3RzIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MjI6IldQX1dpZGdldF9SZWNlbnRfUG9zdHMiO3M6NzoiY29udGVudCI7YTozOntzOjU6InRpdGxlIjtzOjEyOiJSZWNlbnQgUG9zdHMiO3M6NjoibnVtYmVyIjtzOjE6IjMiO3M6OToic2hvd19kYXRlIjtzOjI6Im9uIjt9czo5OiJhbmltYXRpb24iO3M6Mjoibm8iO3M6MTU6ImFuaW1hdGlvbl9kZWxheSI7czoxOiIwIjtzOjE4OiJhbmltYXRpb25fZHVyYXRpb24iO3M6NDoiMTAwMCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO319czoyOiJpZCI7czo2OiJpYldXdEYiO31pOjI7YTo4OntzOjQ6InR5cGUiO3M6NjoibGF5b3V0IjtzOjU6Im9yZGVyIjtzOjE6IjIiO3M6NjoicGFyZW50IjtzOjY6IkFhUnNXTyI7czo3OiJkZXNrdG9wIjtzOjE6IjMiO3M6NjoidGFibGV0IjtzOjE6IjMiO3M6NToicGhvbmUiO3M6MjoiMTIiO3M6NzoiY29udGVudCI7YToxOntpOjA7YToxMzp7czo0OiJ0eXBlIjtzOjc6ImVsZW1lbnQiO3M6MjoiaWQiO3M6NjoiaWZWWFFGIjtzOjU6Im9yZGVyIjtzOjE6IjAiO3M6NjoicGFyZW50IjtzOjY6IkRpT1VoaCI7czoxMToiaGVscGVyX3RleHQiO3M6MTI6IlR3aXR0ZXIgRmVlZCI7czoxMjoid2lkZ2V0X2NsYXNzIjtzOjEyOiJDNUFCX3R3aXR0ZXIiO3M6NzoiY29udGVudCI7YTo0OntzOjE1OiJjNV9oZWxwZXJfdGl0bGUiO3M6MDoiIjtzOjg6ImM1X3RpdGxlIjtzOjEyOiJUd2l0dGVyIEZlZWQiO3M6ODoidXNlcm5hbWUiO3M6ODoiY29kZV8xMjUiO3M6NToiY291bnQiO3M6MToiMiI7fXM6OToiYW5pbWF0aW9uIjtzOjI6Im5vIjtzOjE1OiJhbmltYXRpb25fZGVsYXkiO3M6MToiMCI7czoxODoiYW5pbWF0aW9uX2R1cmF0aW9uIjtzOjQ6IjEwMDAiO3M6NzoiZGVza3RvcCI7czo0OiJUUlVFIjtzOjY6InRhYmxldCI7czo0OiJUUlVFIjtzOjY6Im1vYmlsZSI7czo0OiJUUlVFIjt9fXM6MjoiaWQiO3M6NjoiRGlPVWhoIjt9aTozO2E6ODp7czo0OiJ0eXBlIjtzOjY6ImxheW91dCI7czo1OiJvcmRlciI7czoxOiIzIjtzOjY6InBhcmVudCI7czo2OiJBYVJzV08iO3M6NzoiZGVza3RvcCI7czoxOiIzIjtzOjY6InRhYmxldCI7czoxOiIzIjtzOjU6InBob25lIjtzOjI6IjEyIjtzOjc6ImNvbnRlbnQiO2E6MTp7aTowO2E6MTM6e3M6NDoidHlwZSI7czo3OiJlbGVtZW50IjtzOjI6ImlkIjtzOjY6ImJIbmpDUiI7czo1OiJvcmRlciI7czoxOiIwIjtzOjY6InBhcmVudCI7czo2OiJ4enBtanUiO3M6MTE6ImhlbHBlcl90ZXh0IjtzOjg6IkRyaWJiYmxlIjtzOjEyOiJ3aWRnZXRfY2xhc3MiO3M6MTM6IkM1QUJfZHJpYmJibGUiO3M6NzoiY29udGVudCI7YTo0OntzOjE1OiJjNV9oZWxwZXJfdGl0bGUiO3M6MDoiIjtzOjg6ImM1X3RpdGxlIjtzOjg6IkRyaWJiYmxlIjtzOjg6InVzZXJuYW1lIjtzOjY6ImVudmF0byI7czo1OiJjb3VudCI7czoxOiI0Ijt9czo5OiJhbmltYXRpb24iO3M6Mjoibm8iO3M6MTU6ImFuaW1hdGlvbl9kZWxheSI7czoxOiIwIjtzOjE4OiJhbmltYXRpb25fZHVyYXRpb24iO3M6NDoiMTAwMCI7czo3OiJkZXNrdG9wIjtzOjQ6IlRSVUUiO3M6NjoidGFibGV0IjtzOjQ6IlRSVUUiO3M6NjoibW9iaWxlIjtzOjQ6IlRSVUUiO319czoyOiJpZCI7czo2OiJ4enBtanUiO319czoyOiJpZCI7czo2OiJBYVJzV08iO319',
	);




	return $templates;
}


 ?>
