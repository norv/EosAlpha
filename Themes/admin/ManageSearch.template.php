<?php
/**
 * @name      EosAlpha BBS
 * @copyright 2011 Alex Vie silvercircle(AT)gmail(DOT)com
 *
 * This software is a derived product, based on:
 *
 * Simple Machines Forum (SMF)
 * copyright:	2011 Simple Machines (http://www.simplemachines.org)
 * license:  	BSD, See included LICENSE.TXT for terms and conditions.
 *
 * @version 1.0pre
 */
function template_modify_weights()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=weights" method="post" accept-charset="UTF-8">
			<div class="cat_bar">
				<h3>', $txt['search_weights'], '</h3>
			</div>
			<div class="blue_container">
				<div class="content">
					<dl class="settings">
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_frequency" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_frequency'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_frequency" id="weight1_val" value="', empty($modSettings['search_weight_frequency']) ? '0' : $modSettings['search_weight_frequency'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight1" class="search_weight">', $context['relative_weights']['search_weight_frequency'], '%</span>
						</dd>
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_age" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_age'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_age" id="weight2_val" value="', empty($modSettings['search_weight_age']) ? '0' : $modSettings['search_weight_age'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight2" class="search_weight">', $context['relative_weights']['search_weight_age'], '%</span>
						</dd>
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_length" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_length'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_length" id="weight3_val" value="', empty($modSettings['search_weight_length']) ? '0' : $modSettings['search_weight_length'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight3" class="search_weight">', $context['relative_weights']['search_weight_length'], '%</span>
						</dd>
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_subject" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_subject'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_subject" id="weight4_val" value="', empty($modSettings['search_weight_subject']) ? '0' : $modSettings['search_weight_subject'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight4" class="search_weight">', $context['relative_weights']['search_weight_subject'], '%</span>
						</dd>
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_first_message" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_first_message'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_first_message" id="weight5_val" value="', empty($modSettings['search_weight_first_message']) ? '0' : $modSettings['search_weight_first_message'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight5" class="search_weight">', $context['relative_weights']['search_weight_first_message'], '%</span>
						</dd>
						<dt class="large_caption">
							<a href="', $scripturl, '?action=helpadmin;help=search_weight_frequency" onclick="return reqWin(this.href);" class="help"><strong>[',$txt['help'],']&nbsp;&nbsp;</strong></a>
							', $txt['search_weight_sticky'], ':
						</dt>
						<dd class="large_caption">
							<span class="search_weight"><input type="text" name="search_weight_sticky" id="weight6_val" value="', empty($modSettings['search_weight_sticky']) ? '0' : $modSettings['search_weight_sticky'], '" onchange="calculateNewValues()" size="3" class="input_text" /></span>
							<span id="weight6" class="search_weight">', $context['relative_weights']['search_weight_sticky'], '%</span>
						</dd>
						<dt class="large_caption">
							<strong>', $txt['search_weights_total'], '</strong>
						</dt>
						<dd class="large_caption">
							<span id="weighttotal" class="search_weight"><strong>', $context['relative_weights']['total'], '</strong></span>
							<span class="search_weight"><strong>100%</strong></span>
						</dd>
					</dl>
					<input type="submit" name="save" value="', $txt['search_weights_save'], '" class="button_submit floatright" />
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" /><br class="clear" />
				</div>
			</div>
		</form>
	</div>
	<br class="clear" />
	<script type="text/javascript"><!-- // --><![CDATA[
		function calculateNewValues()
		{
			var total = 0;
			for (var i = 1; i <= 6; i++)
			{
				total += parseInt(document.getElementById(\'weight\' + i + \'_val\').value);
			}
			setInnerHTML(document.getElementById(\'weighttotal\'), total);
			for (var i = 1; i <= 6; i++)
			{
				setInnerHTML(document.getElementById(\'weight\' + i), (Math.round(1000 * parseInt(document.getElementById(\'weight\' + i + \'_val\').value) / total) / 10) + \'%\');
			}
		}
	// ]]></script>';
}

function template_select_search_method()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=method" method="post" accept-charset="UTF-8">
			<div class="cat_bar">
				<h3>', $txt['search_method'], '</h3>
			</div>
			<div class="orange_container">
				<div class="smalltext" style="font-weight: normal;"><a href="', $scripturl, '?action=helpadmin;help=search_why_use_index" onclick="return reqWin(this.href);">', $txt['search_create_index_why'], '</a></div>
			</div><br>
			<div class="blue_container">
				<div class="content">
					<dl class="settings">

			';
	if (!empty($context['table_info']))
		echo '
						<dt>
							<strong>', $txt['search_method_messages_table_space'], ':</strong>
						</dt>
						<dd>
							', $context['table_info']['data_length'], '
						</dd>
						<dt>
							<strong>', $txt['search_method_messages_index_space'], ':</strong>
						</dt>
						<dd>
							', $context['table_info']['index_length'], '
						</dd>';
	echo '
					</dl>
					', $context['double_index'] ? '<div class="information">
					' . $txt['search_double_index'] . '</div>' : '', '
					<fieldset class="search_settings">
						<legend>', $txt['search_index'], '</legend>
						<dl>
							<dt><input type="radio" name="search_index" value=""', empty($modSettings['search_index']) ? ' checked="checked"' : '', ' class="input_radio" />
							', $txt['search_index_none'], '
							</dt>';

	echo '
							<dt>
								<input type="radio" name="search_index" value="custom"', !empty($modSettings['search_index']) && $modSettings['search_index'] == 'custom' ? ' checked="checked"' : '', $context['custom_index'] ? '' : ' onclick="alert(\'' . $txt['search_index_custom_warning'] . '\'); selectRadioByName(this.form.search_method, \'1\');"', ' class="input_radio" />
								', $txt['search_index_custom'], '
							</dt>
							<dd>
								<span class="smalltext">';
	if ($context['custom_index'])
		echo '
									<strong>', $txt['search_index_label'], ':</strong> ', $txt['search_method_index_already_exists'], ' [<a href="', $scripturl, '?action=admin;area=managesearch;sa=removecustom;', $context['session_var'], '=', $context['session_id'], '">', $txt['search_index_custom_remove'], '</a>]<br />
									<strong>', $txt['search_index_size'], ':</strong> ', $context['table_info']['custom_index_length'];
	elseif ($context['partial_custom_index'])
		echo '
									<strong>', $txt['search_index_label'], ':</strong> ', $txt['search_method_index_partial'], ' [<a href="', $scripturl, '?action=admin;area=managesearch;sa=removecustom;', $context['session_var'], '=', $context['session_id'], '">', $txt['search_index_custom_remove'], '</a>] [<a href="', $scripturl, '?action=admin;area=managesearch;sa=createmsgindex;resume;', $context['session_var'], '=', $context['session_id'], '">', $txt['search_index_custom_resume'], '</a>]<br />
									<strong>', $txt['search_index_size'], ':</strong> ', $context['table_info']['custom_index_length'];
	else
		echo '
									<strong>', $txt['search_index_label'], ':</strong> ', $txt['search_method_no_index_exists'], ' [<a href="', $scripturl, '?action=admin;area=managesearch;sa=createmsgindex">', $txt['search_index_create_custom'], '</a>]';
	echo '
								</span>
							</dd>';

	foreach ($context['search_apis'] as $api)
	{
		if (empty($api['label']) || $api['has_template'])
			continue;

		echo '
							<dt>
								<input type="radio" name="search_index" value="', $api['setting_index'], '"', !empty($modSettings['search_index']) && $modSettings['search_index'] == $api['setting_index'] ? ' checked="checked"' : '', ' class="input_radio" />
								', $api['label'] ,'
							</dt>';

	if ($api['desc'])
		echo '
							<dd>
								<span class="smalltext">', $api['desc'], '</span>
							</dd>';
	}

	echo '
						</dl>
					</fieldset>
					<fieldset class="search_settings">
					<legend>', $txt['search_method'], '</legend>
						<input type="checkbox" name="search_force_index" id="search_force_index_check" value="1"', empty($modSettings['search_force_index']) ? '' : ' checked="checked"', ' class="input_check" /><label for="search_force_index_check">', $txt['search_force_index'], '</label><br />
						<input type="checkbox" name="search_match_words" id="search_match_words_check" value="1"', empty($modSettings['search_match_words']) ? '' : ' checked="checked"', ' class="input_check" /><label for="search_match_words_check">', $txt['search_match_words'], '</label>
					</fieldset>
					<div class="clear">
						<input type="submit" name="save" value="', $txt['search_method_save'], '" class="button_submit floatright" />
						<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
					</div>
					<br class="clear">
				</div>
			</div>
		</form>
	</div>
	<br class="clear" />';
}

function template_create_index()
{
	global $context, $settings, $options, $scripturl, $txt;

	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=createmsgindex;step=1" method="post" accept-charset="UTF-8" name="create_index">
			<div class="cat_bar">
				<h3 class="catbg">', $txt['search_create_index'], '</h3>
			</div>
			<div class="windowbg">
				<span class="topslice"><span></span></span>
				<div class="content">
					<dl class="settings">
						<dt>
							<label for="predefine_select">', $txt['search_predefined'], ':</label>
						</dt>
						<dd>
							<select name="bytes_per_word" id="predefine_select">
								<option value="2">', $txt['search_predefined_small'], '</option>
								<option value="4" selected="selected">', $txt['search_predefined_moderate'], '</option>
								<option value="5">', $txt['search_predefined_large'], '</option>
							</select>
						</dd>
					</dl>
					<input type="submit" name="save" value="', $txt['search_create_index_start'], '" class="button_submit" />
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
				</div>
				<span class="botslice"><span></span></span>
			</div>

	</form>
	</div>
	<br class="clear" />';
}

function template_create_index_progress()
{
	global $context, $settings, $options, $scripturl, $txt;
	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=createmsgindex;step=1" name="autoSubmit" method="post" accept-charset="UTF-8">
			<div class="cat_bar">
				<h3 class="catbg">', $txt['search_create_index'], '</h3>
			</div>
			<div class="windowbg">
				<span class="topslice"><span></span></span>
				<div class="content">
					<p>
						', $txt['search_create_index_not_ready'], '
					</p>
					<p>
						<strong>', $txt['search_create_index_progress'], ': ', $context['percentage'], '%</strong>
					</p>
					<input type="submit" name="b" value="', $txt['search_create_index_continue'], '" class="button_submit" />
				</div>
				<span class="botslice"><span></span></span>
			</div>
			<input type="hidden" name="step" value="', $context['step'], '" />
			<input type="hidden" name="start" value="', $context['start'], '" />
			<input type="hidden" name="bytes_per_word" value="', $context['index_settings']['bytes_per_word'], '" />
			<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
		</form>
	</div>
	<br class="clear" />
	<script type="text/javascript"><!-- // --><![CDATA[
		var countdown = 10;
		doAutoSubmit();

		function doAutoSubmit()
		{
			if (countdown == 0)
				document.forms.autoSubmit.submit();
			else if (countdown == -1)
				return;

			document.forms.autoSubmit.b.value = "', $txt['search_create_index_continue'], ' (" + countdown + ")";
			countdown--;

			setTimeout("doAutoSubmit();", 1000);
		}
	// ]]></script>';

}

function template_create_index_done()
{
	global $context, $settings, $options, $scripturl, $txt;
	echo '
	<div id="admincenter">
		<div class="cat_bar">
			<h3 class="catbg">', $txt['search_create_index'], '</h3>
		</div>
		<div class="windowbg">
			<span class="topslice"><span></span></span>
			<div class="content">
				<p>', $txt['search_create_index_done'], '</p>
				<p>
					<strong><a href="', $scripturl, '?action=admin;area=managesearch;sa=method">', $txt['search_create_index_done_link'], '</a></strong>
				</p>
			</div>
			<span class="botslice"><span></span></span>
		</div>
	</div>
	<br class="clear" />';
}

// Add or edit a search engine spider.
function template_spider_edit()
{
	global $context, $settings, $options, $scripturl, $txt;
	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=sengines;sa=editspiders;sid=', $context['spider']['id'], '" method="post" accept-charset="UTF-8">
			<div class="cat_bar">
				<h3 class="catbg">', $context['page_title'], '</h3>
			</div>
			<div class="information">
				', $txt['add_spider_desc'], '
			</div>
			<div class="windowbg">
				<span class="topslice"><span></span></span>
				<div class="content">
					<dl class="settings">
						<dt>
							<strong>', $txt['spider_name'], ':</strong><br />
							<span class="smalltext">', $txt['spider_name_desc'], '</span>
						</dt>
						<dd>
							<input type="text" name="spider_name" value="', $context['spider']['name'], '" class="input_text" />
						</dd>
						<dt>
							<strong>', $txt['spider_agent'], ':</strong><br />
							<span class="smalltext">', $txt['spider_agent_desc'], '</span>
						</dt>
						<dd>
							<input type="text" name="spider_agent" value="', $context['spider']['agent'], '" class="input_text" />
						</dd>
						<dt>
							<strong>', $txt['spider_ip_info'], ':</strong><br />
							<span class="smalltext">', $txt['spider_ip_info_desc'], '</span>
						</dt>
						<dd>
							<textarea name="spider_ip" rows="4" cols="20">', $context['spider']['ip_info'], '</textarea>
						</dd>
					</dl>
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
					<input type="submit" name="save" value="', $context['page_title'], '" class="button_submit" />
				</div>
				<span class="botslice"><span></span></span>
			</div>
		</form>
	</div>
	<br class="clear" />';
}

// Show... spider... logs...
function template_show_spider_logs()
{
	global $context, $txt, $settings, $scripturl;

	echo '
	<div id="admincenter">';

	// Standard fields.
	template_show_list('spider_logs');

	echo '
		<br />
		<div class="cat_bar">
			<h3 class="catbg">', $txt['spider_logs_delete'], '</h3>
		</div>
		<form action="', $scripturl, '?action=admin;area=sengines;sa=logs;', $context['session_var'], '=', $context['session_id'], '" method="post" accept-charset="UTF-8">
			<div class="windowbg">
				<span class="topslice"><span></span></span>
				<div class="content">
					<p>
						', $txt['spider_logs_delete_older'], '
						<input type="text" name="older" id="older" value="7" size="3" class="input_text" />
						', $txt['spider_logs_delete_day'], '
					</p>
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
					<input type="submit" name="delete_entries" value="', $txt['spider_logs_delete_submit'], '" onclick="if (document.getElementById(\'older\').value &lt; 1 &amp;&amp; !confirm(\'' . addcslashes($txt['spider_logs_delete_confirm'], "'") . '\')) return false; return true;" class="button_submit" />
				</div>
				<span class="botslice"><span></span></span>
			</div>
		</form>
	</div>
	<br class="clear" />';
}

function template_manage_sphinx()
{
	global $context, $modSettings, $txt, $scripturl;

	echo '
		<div id="admincenter">
		<div class="cat_bar">
			<h3>',$txt['search_managesphinx'],'</h3>
		</div>';
		if(isset($context['checkresult'])) {
			echo '<div class="blue_container cleantop mediumpadding"><div class="',$context['checkresult']['result'] ? 'message_success ' : 'errorbox ', 'smallpadding centertext">',
			$context['checkresult']['message'],'</div></div>';
		}
		echo '<div class="orange_container cleantop smalltext mediumpadding">',$txt['sphinx_explain_config'],'
		</div>
		<div class="blue_container mediumpadding cleantop">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=managesphinx;save=1" method="post" accept-charset="UTF-8" name="create_index">
			<table style="margin-bottom: 2ex;width:100%;">
				<tr style="vertical-align:top;" class="mediumpadding">
					<td><label for="sphinx_data_path_input"><strong>',$txt['sphinx_index_data_path'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_data_path" id="sphinx_data_path_input" value="', isset($modSettings['sphinx_data_path']) ? $modSettings['sphinx_data_path'] : '/var/sphinx/data', '" size="65" />
						<div class="tinytext">',$txt['sphinx_index_data_path_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_log_path_input"><strong>',$txt['sphinx_log_file_path'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_log_path" id="sphinx_log_path_input" value="', isset($modSettings['sphinx_log_path']) ? $modSettings['sphinx_log_path'] : '/var/sphinx/log', '" size="65" />
						<div class="tinytext">',$txt['sphinx_log_file_path_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_stopword_path_input"><strong>',$txt['sphinx_stop_word_path'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_stopword_path" id="sphinx_stopword_path_input" value="', isset($modSettings['sphinx_stopword_path']) ? $modSettings['sphinx_stopword_path'] : '', '" size="65" />
						<div class="tinytext">',$txt['sphinx_stop_word_path_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_indexer_mem_input"><strong>',$txt['sphinx_memory_limit'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_indexer_mem" id="sphinx_indexer_mem_input" value="', isset($modSettings['sphinx_indexer_mem']) ? $modSettings['sphinx_indexer_mem'] : '32', '" size="4" /> MB
						<div class="tinytext">',$txt['sphinx_memory_limit_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_searchd_server_input"><strong>',$txt['sphinx_searchd_server'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_searchd_server" id="sphinx_searchd_server_input" value="', isset($modSettings['sphinx_searchd_server']) ? $modSettings['sphinx_searchd_server'] : 'localhost', '" size="65" />
						<div class="tinytext">',$txt['sphinx_searchd_server_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_searchd_port_input"><strong>',$txt['sphinx_searchd_port'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_searchd_port" id="sphinx_searchd_port_input" value="', isset($modSettings['sphinx_searchd_port']) ? $modSettings['sphinx_searchd_port'] : '3312', '" size="4" />
						<div class="tinytext">',$txt['sphinx_searchd_port_desc'],'</div><br>
					</td>
				</tr><tr>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinxql_searchd_port_input"><strong>',$txt['sphinx_searchd_qlport'],'</strong></label></td>
					<td>
						<input type="text" name="sphinxql_searchd_port" id="sphinxql_searchd_port_input" value="', isset($modSettings['sphinxql_searchd_port']) ? $modSettings['sphinxql_searchd_port'] : '3313', '" size="4" />
						<div class="tinytext">',$txt['sphinx_searchd_qlport_desc'],'</div><br>
					</td>
				</tr>
				<tr style="vertical-align:top;" class="mediumpadding">
					<td class="textbox"><label for="sphinx_max_results_input"><strong>',$txt['sphinx_max_matches'],'</strong></label></td>
					<td>
						<input type="text" name="sphinx_max_results" id="sphinx_max_results_input" value="', isset($modSettings['sphinx_max_results']) ? $modSettings['sphinx_max_results'] : '2000', '" size="4" />
						<div class="tinytext">',$txt['sphinx_max_matches_desc'],'</div><br>
					</td>
				</tr>
			</table>
			<div class="floatright mediumpadding">
				<input type="submit" value="',$txt['save'],'" class="default" />
				<input type="hidden" name="sc" value="', $context['session_id'], '" />
			</div>
			<div class="clear"></div>
		</form>
		</div>
		<br />
		<div class="orange_container centertext mediumpadding">
		<span class="error">',$txt['sphinx_save_warning'],'</span>
		<form class="mediumpadding" action="',$scripturl,'?action=admin;area=managesearch;sa=sphinxconfig" method="post">
			<input type="submit" class="default" value="',$txt['sphinx_create_config'],'" />
		</form>
		</div>
		<br>
		<div class="blue_container centertext mediumpadding">
		<form action="', $scripturl, '?action=admin;area=managesearch;sa=managesphinx;checkconnect=1" method="post" accept-charset="UTF-8">
			<input type="submit" class="button_submit" value="',$txt['sphinx_test_connection'],'" />
		</form>
		</div>
		</div>';
}
// Show... spider... stats...
function template_show_spider_stats()
{
	global $context, $txt, $settings, $scripturl;

	echo '
	<div id="admincenter">';

	// Standard fields.
	template_show_list('spider_stat_list');

	echo '
		<br />
		<div class="cat_bar">
			<h3 class="catbg">', $txt['spider_logs_delete'], '</h3>
		</div>
		<form action="', $scripturl, '?action=admin;area=sengines;sa=stats" method="post" accept-charset="', $context['character_set'], '">
			<div class="windowbg">
				<div class="content">
					<p>
						', sprintf($txt['spider_stats_delete_older'], '<input type="text" name="older" id="older" value="90" size="3" class="input_text" />'), '
					</p>
					<hr class="hrcolor" />
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
					<input type="submit" name="delete_entries" value="', $txt['spider_logs_delete_submit'], '" onclick="if (document.getElementById(\'older\').value &lt; 1 &amp;&amp; !confirm(\'' . addcslashes($txt['spider_logs_delete_confirm'], "'") . '\')) return false; return true;" class="button_submit" />
					<br />
				</div>
			</div>
		</form>
	</div>
	<br class="clear" />';
}

?>