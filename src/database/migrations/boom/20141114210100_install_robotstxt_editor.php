<?php

class Migration_Boom_20141114210100 extends Minion_Migration_Base
{

	public function up(Kohana_Database $db)
	{
		$db->query(null, "insert into roles (name, description) values ('manage_robots', 'Edit the robots.txt file')");
		$db->query(null, "create table if not exists robots (id mediumint unsigned auto_increment primary key, rules text not null default '', edited_by mediumint unsigned, edited_at int(10) unsigned not null, foreign key (edited_by) references people(id) on update cascade on delete set null)");
	}

	public function down(Kohana_Database $db)
	{
       $db->query(null, "delete from roles where name = 'manage_robots'");
       $db->query(null, "drop table robots");
	}
}