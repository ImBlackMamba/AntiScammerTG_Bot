<?php
require_once 'database.php';
$adminID = [727953170,834570041,808090411,367892199];
//$a = lastrandomString();
##################################################################################
/////////////////////////////////INLINE_MENUS/////////////////////////////////////
##################################################################################

$menu['inline_keyboard'] =
[
	[
		[
			'text'          => '➕ Aggiungimi ad un gruppo ➕',
			'url' => 'http://telegram.me/AntiScammerTG_Bot?startgroup=start'
		]
	],
	[
		[
			'text'          => '📣 Canale',
			'url' => 'http://telegram.me/AntiScammer_TG'
		],
		[
			'text'          => '👥 Gruppo',
			'url' => 'https://t.me/AntiScam_Chat'
		]
	],
	[
		[
			'text' => '⭐️ Staff',
			'callback_data' => 'staff'
		],
		[
			'text' => '🗄 Prove Scammers',
			'url' => 'http://telegram.me/ProveScammers'
		]
	],
	[
		[
			'text'          => '🔰 Verifica Utente 🔰',
			'callback_data' => 'check'
		]
	],
	[
		[
			'text'          => '⚙️ Informazioni ⚙️',
			'callback_data' => 'info'
		]
	]
];

$indietro['inline_keyboard'] =
[
  [
    [
      'text'          => '🔙 Indietro',
      'callback_data' => 'home'
    ]
  ]
];
$a = lastrandomString();
$approve['inline_keyboard'] =
[
  [
    [
      'text'          => '❌NON CLICCARE, USA IL COMANDO .APPROVE❌',
      'callback_data' => "bann".$a .""
    ]
  ]
];

##################################################################################
/////////////////////////////////////DATA/////////////////////////////////////////
##################################################################################


if ($data == 'staff') {
	editMessageText("_🥀 抗-Scam Staff 🥀_

👑 Founder = @RanaSweg
⚜️ Co-founder = @Emifeig04

👮‍♂ Admin = @CrazyBoy_TG
👮‍♂ Admin  = @OfficialDarknessBoy
👮‍♂ Admin  = @KoalaVolante

(Non è tutto il nostro staff ma loro sono i principali )", $message_chat_id, $message_message_id, null, 'HTML', null, $indietro);
}

if ($data == 'check') {
	addStep($from_id);
	editMessageText("Inviami ora l'ID dell'utente da controllare.\nSe non sai cosa è un ID te lo spiego:\nè un identificativo unico di ogni utente, è paragonabile al codice fiscale, in quanto ogni utente di Telegram ha un ID diverso. Lo puoi trovare usando @usinfobot.", $message_chat_id, $message_message_id, null, 'HTML', null, $indietro);
}

if ($data == 'info') {
	editMessageText("Salve io sono un bot creato per bannare gli scammer da tutti i gruppi in cui verrò aggiunto se anche te se contro gli scammer aggiungimi al tuo gruppo e rendimi administratore , dopo di che scrivi a @EmiFeig04 oppure a @RanaSweg da cui riceverai il rank di membro.", $message_chat_id, $message_message_id, null, 'HTML', null, $indietro);
}

if ($data == 'bann'.$a .'') {
  global $query;
  $ID = getRequestID($a);
  $NOME = getRequestNOME($a);
  $USERNAME = getRequestUSERNAME($a);
  $from_id = getRequestfrom_id($a);
  $from_username = getRequestfrom_username($a);
  $PROVE = getRequestPROVE($a);
  //addBanned("$ID", "$PROVE");
  $result = mysqli_query($query, "SELECT * FROM AntiScammerTG_Bot_group");
  $msg_id = getMsgid();
  updateMsgid($msg_id+1);
  sendMessage("-1001164210719", "<b>⚠️UTENTE BANNATO⚠️</b>

Informazioni sull'utente 🕵🏼‍♂️
📧 Nome: <a href='$ID'>$NOME</a>
🆔: <code>$ID</code>
💼 Username: $USERNAME

Bannato da 👨🏼‍🔧
👮🏼‍♂️ Admin: <a href='tg://user?id=$from_id'>$from_username</a>
🆔 Admin: <code>$from_id<code>

Prove 📃 ——> <a href='$PROVE'>@ProveScammers</a>

<b>Troverete le prove usando l'ID o la @ precedente al net ban</b>", 'HTML', true);
  if (mysqli_num_rows($result) > 0) {
    for ($i=0; $i < mysqli_num_rows($result); $i++) {
      $row = mysqli_fetch_assoc($result);
      $at = $row["tgid"];
      //addBan("$at", "$ID");
      forwardMessage($at, $channel_id, getMsgid());
      sleep(0.3);
    }
  }
	foreach ($adminID as $admin) {
		sendMessage($admin, "Ban approvato.");
	}
}

?>
