<?php
error_reporting(0);
function randomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
$randomString = randomString(10);

require_once 'bot.php';

/*if ($from_id != '367892199') {
	die();
}*/

$plugins = glob('plugins/*.php');
foreach ($plugins as $plugin) {
	require_once "$plugin";
}

if ($text == 'ciao') {
	sendMessage($chat_id, "$randomString\n" . lastrandomString());
}
//TEST

//TEST

$adminID = [727953170, 834570041, 808090411, 367892199];
$BOT_ID = "1004979942";
$channel_id = -1001164210719;

##################################################################################
/////////////////////////////////////START////////////////////////////////////////
##################################################################################
$messaggiostart = "Salve benvenuto nel bot ufficiale del Anti-Scam!\n\nPuoi proseguire cliccando uno dei bottoni qua sotto.";
if (stripos($text, '/start')===0 and $chat_type=='private') {
  sendmessage($chat_id, "$messaggiostart", 'HTML', NULL, NULL, NULL, $menu);
}
//home
if ($data == 'home') {
	delStep($from_id);
  editMessageText("$messaggiostart", $message_chat_id, $message_message_id, null, 'HTML', null, $menu);
}

##################################################################################
///////////////////////////////////PUBBLICI///////////////////////////////////////
##################################################################################

if (stripos($text, "/antiscam")===0 or stripos($text, ".antiscam")===0) {
	sendMessage($chat_id, "_🥀 抗-Scam Staff 🥀_

👑 Founder = @RanaSweg
⚜️ Co-founder = @Emifeig04

👮‍♂  Admin = @CrazyBoy_TG
👮‍♂  Admin  = @OfficialDarknessBoy
👮‍♂  Admin  = @KoalaVolante", 'HTML');
}

if (stripos($text, "/check ")===0 or stripos($text, ".check ")===0) {
	$ID = explode(" ", $text, 2)[1];
	if (is_numeric($ID)) {
		$u = getChat($ID)['result'];
		$username = $u['username'];      
		$id = $u['id'];
		if ($u) {
			if (isBanned("$ID")) {
				sendMessage($chat_id, "<a href='tg://user?id=$id'>$username</a> è uno Scammer!\nProve: $proof!", 'HTML');
			} else {
				sendMessage($chat_id, "<a href='tg://user?id=$id'>$username</a> non ha ancora scammato.", 'HTML');
			}
		} else {
			sendMessage($chat_id, "Utente non trovato.", 'HTML');
		}
	} else {
		sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
	}
} elseif ($text == "/check" or $text == ".check") {
	sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
}

##################################################################################
/////////////////////////////////////FOUNDER//////////////////////////////////////
##################################################################################

if (in_array($from_id, $adminID)) {
	if (in_array($from_id, [727953170,834570041,367892199])) {
    
  if (stripos($text, "/approve ")===0 or stripos($text, ".approve ")===0) {
  $string = explode(" ", $text, 2)[1];
  global $query;
  $ID = getRequestID($a);
  $NOME = getRequestNOME($a);
  $USERNAME = getRequestUSERNAME($a);
  $from_id = getRequestfrom_id($a);
  $from_username = getRequestfrom_username($a);
  $PROVE = getRequestPROVE($a);
  		if(isBanned("$ID")) {
			sendMessage($chat_id, "Netban è già <b>approvato!</b>", 'HTML');
		} else {
  addBanned("$ID", "$PROVE");
  $result = mysqli_query($query, "SELECT * FROM AntiScammerTG_Bot_group");
  $total = totalGroup();
  $msg_id = getMsgid();
  updateMsgid($msg_id+1);
  sendMessage("-1001164210719", "<b>⚠️UTENTE BANNATO⚠️</b>

Informazioni sull'utente 🕵🏼‍♂️
📧 Nome: <a href='tg://user?id=$ID'>$NOME</a>
🆔: <a href='tg://user?id=$ID'><code>$ID</code></a>
💼 Username: $USERNAME

Bannato da 👨🏼‍🔧
👮🏼‍♂️ Admin: <a href='tg://user?id=$from_id'>$from_username</a>
🆔 Admin: <code>$from_id</code>

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
} elseif ($text == "/approve") {
		sendMessage($chat_id, "Devi inserire dei <b>parametri</b>!", 'HTML');
	}
		//ADMIN
		if (stripos($text, "/admin ")===0 or stripos($text, ".admin ")===0) {
			$ID = explode(" ", $text, 2)[1];
			if(isAdmin("$ID")) {
				sendMessage($chat_id, "L'utente è già <b>admin!</b>", 'HTML');
			} else {
				if (is_numeric($ID)) {
					addAdmin("$ID");
					sendMessage($chat_id, "Utente reso admin!", 'HTML');
				} else {
					sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
				}
			}
		} elseif ($text == "/admin" or $text == ".admin") {
			sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
		}

		//UNADMIN
		if (stripos($text, "/unadmin ")===0 or stripos($text, ".unadmin ")===0) {
			$ID = explode(" ", $text, 2)[1];
			if(!isAdmin("$ID")) {
				sendMessage($chat_id, "L'utente non è <b>admin!</b>", 'HTML');
			} else {
				if (is_numeric($ID)) {
					delAdmin("$ID");
					sendMessage($chat_id, "Utente non è più admin!", 'HTML');
				} else {
					sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
				}
			}
		} elseif ($text == "/unadmin" or $text == ".unadmin") {
			sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
		}
	}

	//VIP
	if (stripos($text, "/vip ")===0 or stripos($text, ".vip ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if(isVip("$ID")) {
			sendMessage($chat_id, "L'utente è già <b>vip!</b>", 'HTML');
		} else {
			if (is_numeric($ID)) {
				addVip("$ID");
				sendMessage($chat_id, "Utente reso vip!", 'HTML');
			} else {
				sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
			}
		}
	} elseif ($text == "/vip" or $text == '.vip') {
		sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
	}

	//UNVIP
	if (stripos($text, "/unvip ")===0 or stripos($text, ".unvip ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if(!isVip("$ID")) {
			sendMessage($chat_id, "L'utente non è <b>vip!</b>", 'HTML');
		} else {
			if (is_numeric($ID)) {
				delVip("$ID");
				sendMessage($chat_id, "Utente non è più vip!", 'HTML');
			} else {
				sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
			}
		}
	} elseif ($text == "/unvip" or $text == '.unvip') {
		sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
	}

	//MEMBRO
	if (stripos($text, "/membro ")===0 or stripos($text, ".membro ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if(isMembro("$ID")) {
			sendMessage($chat_id, "L'utente è già <b>membro!</b>", 'HTML');
		} else {
			if (is_numeric($ID)) {
				addMembro("$ID");
				sendMessage($chat_id, "Utente reso membro!", 'HTML');
			} else {
				sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
			}
		}
	} elseif ($text == "/membro" or $text == ".membro") {
		sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
	}

	//UNMEMBRO
	if (stripos($text, "/unmembro ")===0 or stripos($text, ".unmembro ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if(!isMembro("$ID")) {
			sendMessage($chat_id, "L'utente non è <b>membro!</b>", 'HTML');
		} else {
			if (is_numeric($ID)) {
				delMembro("$ID");
				sendMessage($chat_id, "Utente non è più membro!", 'HTML');
			} else {
				sendMessage($chat_id, "Questo non è un ID valido!", 'HTML');
			}
		}
	} elseif ($text == "/unmembro" or $text == ".unmembro") {
		sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
	}


}
##################################################################################
/////////////////////////////////////ADMIN///////////////////////////////////////
##################################################################################

if (isAdmin("$from_id")) {

	//BAN
	if(stripos($text, "/netban ")===0 or stripos($text, ".netban ")===0) {
		$CONFIG = explode(" ", $text,5);
		$ID = $CONFIG[1];
		$USERNAME = $CONFIG[2];
		$PROVE = $CONFIG[3];
		$NOME = $CONFIG[4];
		if(isBanned("$ID")) {
			sendMessage($chat_id, "L'utente è già <b>bannato!</b>", 'HTML');
		} else {
			if (stripos($USERNAME, "@")===0) {
				if (stripos($PROVE, "https://t.me/")===0) {
					if (is_numeric($ID)) {
						foreach($adminID as $admin) {
							sendMessage($admin, "<b>⚠️UTENTE BANNATO DA APPROVARE⚠️</b>

Informazioni sull'utente 🕵🏼‍♂️
📧 Nome: <a href='$ID'>$NOME</a>
🆔: <code>$ID</code>
‍💼 Username: $USERNAME

Bannato da 👨🏼‍🔧
👮🏼‍♂️ Admin: <a href='tg://user?id=$from_id'>@$from_username</a>
🆔 <code>$from_id</code>

Codice Approvazione ⚙️
⚒ Codice: <code>$randomString</code>

Prove 📃 ——> <a href='$PROVE'>@ProveScammers</a>

<b>Troverete le prove usando l'ID o la @ precedente al net ban</b>", 'HTML', true, null, null, $approve);
						}
						addRequestBan($ID, $USERNAME, $PROVE, $NOME, $from_id, $from_username, $randomString);
						sendMessage($chat_id, "Scammer in fase di approvazione", 'HTML');
					} else {
						sendMessage($chat_id, "ID non valido.", 'HTML');
					}

				} else {
					sendMessage($chat_id, "Link non valido.", 'HTML');
				}
			} else {
				sendMessage($chat_id, "Username non valido.", 'HTML');
			}
		}
	} elseif ($text == "/netban" or $text == ".netban") {
		sendMessage($chat_id, "Devi inserire dei <b>parametri</b>!", 'HTML');
	}

	if (stripos($text, "/groups")===0 or stripos($text, ".groups")===0) {
		sendMessage($chat_id, "<b>Aspetta qualche secondo</b>");
		$groupz = arrayGetGroups();
		foreach ($groupz as $group) {
			$dio = exportChatInviteLink($group);
			$invite = getChat($group)['result']['username'];
			$invites = getChat($group)['result']['invite_link'];
			if ($invite) {
				$sos = "@$invite";
			} elseif ($invites) {
				$sos = $invites;
			} else {
				$sos = $dio;
			}
			if (!$sos) {
				delGroup($group);
			}
			$lista .= "\n$group > $sos";
			}
		sendMessage($chat_id, $lista);
	}

	//UNBAN
	if (stripos($text, "/unbanns ")===0 or stripos($text, ".unbanns ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if(!isBanned("$ID")) {
			sendMessage($chat_id, "L'utente non è <b>bannato!</b>", 'HTML');
		} else {
			if (is_numeric($ID)) {
				delBanned("$ID");
				$msg_id = getMsgid();
				updateMsgid($msg_id+1);
				sendMessage("-1001164210719", "💠 <b>UNBAN GLOBALE</b> 💠\n👨‍Utente = <code>$ID</code>\n📃L'utente " . getChat($ID)['result']['first_name']. " e stato unbannato dal momento che non ha commesso nessuna truffa noi dello staff porgiamo le nostre scuse...Buona Giornata ❗️", 'HTML', true);
				$action = "SELECT * FROM AntiScammerTG_Bot_group";
				$result = mysqli_query($query, $action);
				if (mysqli_num_rows($result) > 0) {
					for ($i=0; $i < mysqli_num_rows($result); $i++) {
						$row = mysqli_fetch_assoc($result);
						unbanChatMember($row["tgid"], $IDz);
						forwardMessage($row["tgid"], $channel_id, getMsgid());
						sleep(0.3);
					}
				}
				sendMessage($chat_id, "L'Utente è stato <b>sbannato</b>!", 'HTML');
			} else {
				sendMessage($chat_id, "Questo non è un <b>ID</b> valido!", 'HTML');
			}
		}
	} elseif ($text == "/unban" or $text == ".unban") {
		sendMessage($chat_id, "Devi inserire un <b>ID</b>!", 'HTML');
	}

	if (stripos($text, "/silentban ")===0 or stripos($text, ".silentban ")===0) {
		$ID = explode(" ", $text, 2)[1];
		if (mysqli_num_rows($result) > 0) {
			for ($i=0; $i < mysqli_num_rows($result); $i++) {
				$row = mysqli_fetch_assoc($result);
				$at = $row["tgid"];
				kickChatMember("$at", "$ID");
				sleep(0.3);
			}
		}
		sendMessage($chat_id, "Fatto");

	}
	//STATS
	if (stripos($text, "/conta")===0 or stripos($text, ".conta")===0) {
		sendMessage($chat_id, "<b>Conteggio</b>\n\nBannati: ".totalBanned()."\nGruppi: ".totalGroup()."\nAdmin: ".totalAdmin()."\nVip: ".totalVip() , 'HTML');
	}
}

##################################################################################
/////////////////////////////////////VIP//////////////////////////////////////////
##################################################################################
if (isVip("$from_id")) {
	if (stripos($text, "/kickme")===0 or stripos($text, ".kickme")===0) {
		kickChatMember($chat_id, $from_id);
		unbanChatMember($chat_id, $from_id);
	}
  if (stripos($text, "/vip")===0 or stripos($text, ".vip")===0) {
  	sendMessage($chat_id, "$from_first_name tu sì che sei un vero vip 😎💰 perché hai fatto una donazione a 抗-Scam", 'HTML');
  }

}

##################################################################################
////////////////////////////////////MEMBRI////////////////////////////////////////
##################################################################################

if (isMembro("$from_id")) {
  if (stripos($text, "/membro")===0 or stripos($text, ".membro")===0) {
  	sendMessage($chat_id, "$from_first_name vero membro supporter del 抗-Scam 💪😎", 'HTML');
  }
}
##################################################################################
/////////////////////////////////////GROUP////////////////////////////////////////
##################################################################################
$controllo = getChatMember($chat_id, $BOT_ID)['result']['status'];

if ($update['message']['new_chat_members']['0']['id'] == "$BOT_ID") {
	sendMessage($chat_id, "<b>Mettetemi admin ed eseguite /fatto</b>", "HTML");
}

//SISTEMA GROUPBAN
if ($chat_type != "private") {
	if (stripos($text, "/fatto")===0 or stripos($text, ".fatto")===0) {
		if (!isGroup("$chat_id")) {
			if ($controllo == "administrator") {
				addGroup($chat_id);
				global $query;
				$action = "SELECT * FROM AntiScammerTG_Bot_ban";
				$result = mysqli_query($query, $action);
				if (mysqli_num_rows($result) > 0) {
					for ($i=0; $i < mysqli_num_rows($result); $i++) {
						$row = mysqli_fetch_assoc($result);
			       $id = $row["tgid"];
						kickChatMember($chat_id, "$id");
			       sleep(0.3);
					}
				}
				sendMessage($chat_id, "Gruppo aggiunto correttamente!", 'HTML');
			} else {
				sendMessage($chat_id, "Non sono amministratore!", 'HTML');
			}
		} else {
			sendMessage($chat_id, "Hai già eseguito <b>/fatto</b> in questo gruppo!", 'HTML');
		}
	}
}

if ($update['channel_post']['chat']['id'] == "$channel_id") {
	$id = $update['channel_post']['message_id'];
	updateMsgid("$id");
	$groupz = arrayGetGroups();
	foreach ($groupz as $at) {
		if ($at != $channel_id) {
			forwardMessage($at, $channel_id, $id);
		}
	}
}


##################################################################################
/////////////////////////////////////CHECK////////////////////////////////////////
##################################################################################

if (getStep($from_id) == "1") {
	if (is_numeric($text)) {
		if ($chat_type == 'private') {
			if (getChat($text)['ok']) {
				$u = getChat($text)['result'];
				$username = $u['username'];
				$id = $u['id'];
				if (isBanned($text)) {
					$proof = getProof($text);
					sendMessage($chat_id, "<a href='tg://user?id=$id'>$username</a> è uno Scammer\nProve: $proof", 'HTML', null, null, null, $indietro);
					delStep($from_id);
				} else {
					sendMessage($chat_id, "<a href='tg://user?id=$id'>$username</a> non è uno Scammer", 'HTML', null, null, null, $indietro);
					delStep($from_id);
				}
			} else {
				sendMessage($chat_id, 'Utente non trovato. (Probabilmente non ha mai interagito col bot oppure non esiste.)', 'HTML', null, null, null, $indietro);
				delStep($from_id);
			}
		}
	} else {
		sendMessage($chat_id, "ID non valido... Riprova.");
	}
}

if (!isUser($from_id)) {
	addUser($from_id);
}
