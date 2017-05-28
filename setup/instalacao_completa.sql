/*
| Modifica a tabela accounts para que seja possível adicionar o nome e
| email do dono da conta
*/
ALTER TABLE `accounts`
ADD COLUMN `nome` VARCHAR(45) NULL DEFAULT NULL,
ADD COLUMN `email` VARCHAR(45) NULL DEFAULT NULL AFTER `nome`,
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC);

/*
| Tabela interna com o nome das classes
*/
DROP TABLE IF EXISTS `site_class_list`;
CREATE TABLE `site_class_list` (
  `class_name` varchar(20) NOT NULL DEFAULT '',
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


LOCK TABLES `site_class_list` WRITE;
INSERT INTO `site_class_list` VALUES ('H_Fighter',0),('H_Warrior',1),('H_Gladiator',2),('H_Duelist',88),('H_Warlord',3),('H_Dreadnought',89),('H_Knight',4),('H_Paladin',5),('H_PhoenixKnight',90),('H_DarkAvenger',6),('H_HellKnight',91),('H_Rogue',7),('H_TreasureHunter',8),('H_Adventurer',93),('H_Hawkeye',9),('H_Sagittarius',92),('H_Mage',10),('H_Wizard',11),('H_Sorceror',12),('H_Archmage',94),('H_Necromancer',13),('H_Soultaker',95),('H_Warlock',14),('H_ArcanaLord',96),('H_Cleric',15),('H_Bishop',16),('H_Cardinal',97),('H_Prophet',17),('H_Hierophant',98),('E_Fighter',18),('E_Knight',19),('E_TempleKnight',20),('E_EvaTemplar',99),('E_SwordSinger',21),('E_SwordMuse',100),('E_Scout',22),('E_PlainsWalker',23),('E_WindRider',101),('E_SilverRanger',24),('E_MoonlightSentinel',102),('E_Mage',25),('E_Wizard',26),('E_SpellSinger',27),('E_MysticMuse',103),('E_ElementalSummoner',28),('E_ElementalMaster',104),('E_Oracle',29),('E_Elder',30),('E_EvaSaint',105),('DE_Fighter',31),('DE_PaulusKnight',32),('DE_ShillienKnight',33),('DE_ShillienTemplar',106),('DE_BladeDancer',34),('DE_SpectralDancer',107),('DE_Assassin',35),('DE_AbyssWalker',36),('DE_GhostHunter',108),('DE_PhantomRanger',37),('DE_GhostSentinel',109),('DE_Mage',38),('DE_DarkWizard',39),('DE_Spellhowler',40),('DE_StormScreamer',110),('DE_PhantomSummoner',41),('DE_SpectralMaster',111),('DE_ShillienOracle',42),('DE_ShillienElder',43),('DE_ShillienSaint',112),('O_Fighter',44),('O_Raider',45),('O_Destroyer',46),('O_Titan',113),('O_Monk',47),('O_Tyrant',48),('O_GrandKhavatari',114),('O_Mage',49),('O_Shaman',50),('O_Overlord',51),('O_Dominator',115),('O_Warcryer',52),('O_Doomcryer',116),('D_Fighter',53),('D_Scavenger',54),('D_BountyHunter',55),('D_FortuneSeeker',117),('D_Artisan',56),('D_Warsmith',57),('D_Maestro',118),('K_Male_Soldier',123),('K_Male_Trooper',125),('K_Male_Berserker',127),('K_Male_Doombringer',131),('K_Male_Soulbreaker',128),('K_Male_Soulhound',132),('K_Female_Soldier',124),('K_Female_Warder',126),('K_Female_Soulbreaker',129),('K_Female_Soulhound',133),('K_Female_Arbalester',130),('K_Female_Trickster',134),('K_Inspector',135),('K_Judicator',136);
UNLOCK TABLES;
