CREATE TABLE IF NOT EXISTS section
(
  id   INTEGER PRIMARY KEY NOT NULL,
  name TEXT                NOT NULL
);
CREATE UNIQUE INDEX section_name_uindex
  ON public.section (name);


CREATE SEQUENCE IF NOT EXISTS section_id_seq;
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER TABLE public.section
  OWNER TO postgres;


CREATE TABLE IF NOT EXISTS recipe
(
  id         INTEGER PRIMARY KEY NOT NULL,
  section_id INTEGER             NOT NULL,
  title      TEXT                NOT NULL,
  level      SMALLINT            NOT NULL,
  content    TEXT,
  CONSTRAINT recipe_section_id_fk FOREIGN KEY (section_id) REFERENCES section (id)
);
CREATE INDEX recipe_section_id_index
  ON recipe (section_id);

CREATE SEQUENCE IF NOT EXISTS recipe_id_seq;
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER TABLE public.recipe
  OWNER TO postgres;
