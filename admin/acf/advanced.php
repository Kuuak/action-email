<?php
if(function_exists("acf_add_local_field_group"))
{

	acf_add_local_field_group(array (
		'key' => 'group_5986f64b20d77',
		'title' => 'Avancé',
		'fields' => array (
			array (
				'key' => 'field_5986f65c8c18e',
				'label' => 'En-têtes',
				'name' => 'headers',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array (
					array (
						'key' => 'field_5986f6718c18f',
						'label' => 'Valeur',
						'name' => 'value',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'email_template_cpt',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
}
