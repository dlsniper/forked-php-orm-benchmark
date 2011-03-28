
-----------------------------------------------------------------------
-- book
-----------------------------------------------------------------------

DROP TABLE [book];

-- Book Table
CREATE TABLE [book]
(
	[id] INTEGER NOT NULL PRIMARY KEY,
	[title] VARCHAR(255) NOT NULL,
	[isbn] VARCHAR(24) NOT NULL,
	[price] FLOAT,
	[author_id] INTEGER
);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY ([author_id]) REFERENCES author ([id])

-----------------------------------------------------------------------
-- author
-----------------------------------------------------------------------

DROP TABLE [author];

-- Author Table
CREATE TABLE [author]
(
	[id] INTEGER NOT NULL PRIMARY KEY,
	[first_name] VARCHAR(128) NOT NULL,
	[last_name] VARCHAR(128) NOT NULL,
	[email] VARCHAR(128)
);
