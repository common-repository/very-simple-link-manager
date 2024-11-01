"use strict";

(function () {
	var _wp = wp,
	registerBlockType = _wp.blocks.registerBlockType,
	createElement = _wp.element.createElement,
	serverSideRender = _wp.serverSideRender === void 0 ? _wp.components.serverSideRender : _wp.serverSideRender,
	InspectorControls = _wp.blockEditor.InspectorControls,
	PanelBody = _wp.components.PanelBody,
	SelectControl = _wp.components.SelectControl,
	TextareaControl = _wp.components.TextareaControl,
	Placeholder = _wp.components.Placeholder,
	Button = _wp.components.Button;

	registerBlockType('vslm/vslm-block', {
		title: 'VS Link Manager',
		icon: 'editor-ul',
		category: 'text',
		attributes: {
			listType: {
				type: 'string'
			},
			shortcodeSettings: {
				type: 'string'
			},
			noNewChanges: {
				type: 'boolean'
			},
			executed: {
				type: 'boolean'
			}
		},
		edit: function edit(props) {
			var _props = props,
			setAttributes = _props.setAttributes,
			attributes = _props.attributes,
			attributes$lis = attributes.listType,
			listType = attributes$lis === void 0 ? null : attributes$lis,
			listOptions = vslm_block_l10n.listTypes.map( value => (
				{ value: value.id, label: value.label }
			) ),
			attributes$sho = attributes.shortcodeSettings,
			shortcodeSettings = attributes$sho === void 0 ? null : attributes$sho,
			attributes$cli = attributes.noNewChanges,
			noNewChanges = attributes$cli === void 0 ? true : attributes$cli,
			attributes$exe = attributes.executed,
			executed = attributes$exe === void 0 ? false : attributes$exe;

			function selectType(value) {
				setAttributes({
					listType: value
				});
			}

			function setState(shortcodeSettingsContent) {
				setAttributes({
					noNewChanges: false,
					shortcodeSettings: shortcodeSettingsContent
				});
			}

			function previewClick(content) {
				setAttributes({
					noNewChanges: true,
					executed: false
				});
			}

			function afterRender() {
				setAttributes({
					executed: true
				});
			}

			var jsx;

			jsx = [React.createElement(InspectorControls, {
					key: "vslm-block-editor-inspector-controls"
				},
				React.createElement(PanelBody, {
					key: "vslm-block-editor-panel-body",
					title: vslm_block_l10n.addSettings
				},
				React.createElement(SelectControl, {
					key: "vslm-block-editor-select",
					label: vslm_block_l10n.listTypeLabel,
					value: listType,
					options: listOptions,
					onChange: selectType
				}),
				React.createElement(TextareaControl, {
					key: "vslm-block-editor-textarea",
					label: vslm_block_l10n.shortcodeSettingsLabel,
					help: vslm_block_l10n.example + ": links_per_category=\"5\"",
					value: shortcodeSettings,
					onChange: setState
				}),
				React.createElement('div', {
					key: "vslm-block-editor-preview-button-div",
					className: "components-base-control"
				},
				React.createElement(Button, {
					key: "vslm-block-editor-preview-button-primary",
					onClick: previewClick,
					isSecondary: true
				}, vslm_block_l10n.previewButton
				)
				),
				React.createElement('div', {
					key: "vslm-block-editor-info-div",
					className: "components-base-control"
				}, vslm_block_l10n.linkText + " "
				,
				React.createElement('a', {
					key: "vslm-block-editor-info-link",
					href: "https://wordpress.org/plugins/very-simple-link-manager",
					rel: "noopener noreferrer",
					target: "_blank"
				}, vslm_block_l10n.linkLabel
				)
				)
				)
			)];

			if (noNewChanges) {
				afterRender();
				jsx.push(React.createElement(serverSideRender, {
					key: "vslm-block-editor-server-side-render",
					block: "vslm/vslm-block",
					attributes: props.attributes
				}));
			} else {
				props.attributes.noNewChanges = false;
				jsx.push(React.createElement(Placeholder, {
					key: "vslm-block-editor-placeholder"
				}, React.createElement(Button, {
					key: "vslm-block-editor-preview-button-secondary",
					onClick: previewClick,
					isSecondary: true
				}, vslm_block_l10n.previewButton
				)
				));
			}

			return jsx;
		},
		save: function save() {
			return null;
		}
	});
})();
