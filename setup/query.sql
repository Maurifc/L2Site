/*
* Accounts - Add campos 'nome' e 'email'
*/
ALTER TABLE `l2java`.`accounts`
ADD COLUMN `nome` VARCHAR(45) NULL DEFAULT NULL AFTER `lastServer`,
ADD COLUMN `email` VARCHAR(45) NULL DEFAULT NULL AFTER `nome`;
