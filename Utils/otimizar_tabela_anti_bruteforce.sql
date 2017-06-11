DELETE FROM anti_bruteforce WHERE horaBloqueio < NOW() - INTERVAL 1 HOUR;
