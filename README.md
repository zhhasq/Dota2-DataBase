# Dota2-DataBase
https://www.cs.unm.edu/~zhongs/cs564/

Schemas:
    Player(account_ID, skill, win_num, match_num) key: account_ID

    Hero(hero_ID, hero_name, system_name) key: hero_ID

    Game(match_ID, duration_sec, start_time, winning_team)  key: match_ID

    Join_match(match_ID, hero_ID, account_ID, player_slot)  key: match_ID, hero_ID, account_ID,

    Event(match_ID, event_name, time_sec, related_player_slot)  key: match_ID, event_name, time_sec

    Battle_happen(match_ID, battle_ID) key: match_ID, battle_ID

    Battle(battle_ID, start_time_sec, end_time_sec) key: battle_ID

    Battle_player(player_slot, battle_ID, damage, death, xp_start, xp_end) key: player_slot, battle_ID

    Upgrade(match_ID,  upgrade_time, player_slot, ability, level) key: match_ID, upgrade_time, player_slot, level
