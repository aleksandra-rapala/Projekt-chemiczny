

-- ----------------------------
-- Sequence structure for account_type_id_account_type_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."account_type_id_account_type_seq";
CREATE SEQUENCE "public"."account_type_id_account_type_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for board_id_board_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."board_id_board_seq";
CREATE SEQUENCE "public"."board_id_board_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for calculator_id_calculator_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."calculator_id_calculator_seq";
CREATE SEQUENCE "public"."calculator_id_calculator_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for chemical_element_id_chemical_element_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."chemical_element_id_chemical_element_seq";
CREATE SEQUENCE "public"."chemical_element_id_chemical_element_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for reaction_id_reaction_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."reaction_id_reaction_seq";
CREATE SEQUENCE "public"."reaction_id_reaction_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for table_id_table_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."table_id_table_seq";
CREATE SEQUENCE "public"."table_id_table_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_id_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_id_user_seq";
CREATE SEQUENCE "public"."user_id_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for account_type
-- ----------------------------
DROP TABLE IF EXISTS "public"."account_type";
CREATE TABLE "public"."account_type" (
  "id_account_type" int4 NOT NULL DEFAULT nextval('account_type_id_account_type_seq'::regclass),
  "account_type" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of account_type
-- ----------------------------
INSERT INTO "public"."account_type" VALUES (1, 'user');
INSERT INTO "public"."account_type" VALUES (2, 'admin');

-- ----------------------------
-- Table structure for board
-- ----------------------------
DROP TABLE IF EXISTS "public"."board";
CREATE TABLE "public"."board" (
  "id_board" int4 NOT NULL DEFAULT nextval('board_id_board_seq'::regclass),
  "id_user" int4 NOT NULL
)
;

-- ----------------------------
-- Records of board
-- ----------------------------
INSERT INTO "public"."board" VALUES (42, 73);
INSERT INTO "public"."board" VALUES (43, 74);

-- ----------------------------
-- Table structure for board-calculator
-- ----------------------------
DROP TABLE IF EXISTS "public"."board-calculator";
CREATE TABLE "public"."board-calculator" (
  "id_board" int4,
  "id_calculator" int4
)
;

-- ----------------------------
-- Records of board-calculator
-- ----------------------------
INSERT INTO "public"."board-calculator" VALUES (42, 2);

-- ----------------------------
-- Table structure for board-table
-- ----------------------------
DROP TABLE IF EXISTS "public"."board-table";
CREATE TABLE "public"."board-table" (
  "id_board" int4 NOT NULL,
  "id_table" int4 NOT NULL
)
;

-- ----------------------------
-- Records of board-table
-- ----------------------------
INSERT INTO "public"."board-table" VALUES (42, 10);

-- ----------------------------
-- Table structure for calculator
-- ----------------------------
DROP TABLE IF EXISTS "public"."calculator";
CREATE TABLE "public"."calculator" (
  "id_calculator" int4 NOT NULL DEFAULT nextval('calculator_id_calculator_seq'::regclass),
  "name_calculator" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "img_calculator" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "endpoint_calculator" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of calculator
-- ----------------------------
INSERT INTO "public"."calculator" VALUES (2, 'Percentage', 'percentage.jpg', 'seePercentage');
INSERT INTO "public"."calculator" VALUES (3, 'Molar mass', 'molar_mass.png', 'seeMolarMass');

-- ----------------------------
-- Table structure for chemical_element
-- ----------------------------
DROP TABLE IF EXISTS "public"."chemical_element";
CREATE TABLE "public"."chemical_element" (
  "id_chemical_element" int4 NOT NULL DEFAULT nextval('chemical_element_id_chemical_element_seq'::regclass),
  "name_chemical_element" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "sign_chemical_element" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "molar_mass" float8 NOT NULL
)
;

-- ----------------------------
-- Records of chemical_element
-- ----------------------------
INSERT INTO "public"."chemical_element" VALUES (3, 'potas', 'K', 12);
INSERT INTO "public"."chemical_element" VALUES (2, 'wapń', 'Ca', 30);
INSERT INTO "public"."chemical_element" VALUES (4, 'krzem', 'Si', 56);
INSERT INTO "public"."chemical_element" VALUES (1, 'sód', 'Na', 23);
INSERT INTO "public"."chemical_element" VALUES (5, 'tlen', 'O', 16);
INSERT INTO "public"."chemical_element" VALUES (6, 'azot', 'N', 14);
INSERT INTO "public"."chemical_element" VALUES (7, 'węgiel', 'C', 12);

-- ----------------------------
-- Table structure for reaction
-- ----------------------------
DROP TABLE IF EXISTS "public"."reaction";
CREATE TABLE "public"."reaction" (
  "id_reaction" int4 NOT NULL DEFAULT nextval('reaction_id_reaction_seq'::regclass),
  "name_reaction" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "chemical_formula" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_board" int4 NOT NULL,
  "description" varchar(255) COLLATE "pg_catalog"."default",
  "img_reaction" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of reaction
-- ----------------------------
INSERT INTO "public"."reaction" VALUES (1, 'Powstawanie wody', 'H2 + O2 -> 2H2O', 42, 'W wyniku reakcji powstaje woda. Jest to reakcja syntezy.', 'reakcja1.png');
INSERT INTO "public"."reaction" VALUES (2, 'Powstawanie dwutlenku węgla', '2CO + O2 -> 2CO2', 42, 'W wyniku powstaje gaz, który powoduje mętnienie wody wapiennej.', 'reakcja2.png');

-- ----------------------------
-- Table structure for table
-- ----------------------------
DROP TABLE IF EXISTS "public"."table";
CREATE TABLE "public"."table" (
  "id_table" int4 NOT NULL DEFAULT nextval('table_id_table_seq'::regclass),
  "name_table" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "img_table" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "img_content_table" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of table
-- ----------------------------
INSERT INTO "public"."table" VALUES (2, 'Electrochemical series', 'electrochemical.jpg', 'electrochemical_table.png');
INSERT INTO "public"."table" VALUES (10, 'Periodic table', 'periodic.jpg', 'periodic_table.png');
INSERT INTO "public"."table" VALUES (3, 'Electronegativity table', 'electronegativity.png', 'electronegativity_table.png');
INSERT INTO "public"."table" VALUES (1, 'Solubility table', 'solubility.jpg', 'solubility_table.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "public"."user";
CREATE TABLE "public"."user" (
  "id_user" int4 NOT NULL DEFAULT nextval('user_id_user_seq'::regclass),
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "enabled" bool NOT NULL DEFAULT false,
  "salt" int4 NOT NULL,
  "id_account_type" int4 NOT NULL
)
;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES (74, 'admin@mail.com', '$2y$10$5y0ltp1eo8LwHeNn9m.cueFFA4nKScazVZBEq5Qt4VzJECMN4L1ZS', 'f', 12, 2);
INSERT INTO "public"."user" VALUES (73, 'olka.rapala@mail.com', '$2y$10$6JIh4CVNKC07VWYcj8PaM.ZmPdjeJRxYe4wTuoavP71LbhVokhiC.', 'f', 5, 1);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."account_type_id_account_type_seq"
OWNED BY "public"."account_type"."id_account_type";
SELECT setval('"public"."account_type_id_account_type_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."board_id_board_seq"
OWNED BY "public"."board"."id_board";
SELECT setval('"public"."board_id_board_seq"', 45, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."calculator_id_calculator_seq"
OWNED BY "public"."calculator"."id_calculator";
SELECT setval('"public"."calculator_id_calculator_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."chemical_element_id_chemical_element_seq"
OWNED BY "public"."chemical_element"."id_chemical_element";
SELECT setval('"public"."chemical_element_id_chemical_element_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."reaction_id_reaction_seq"
OWNED BY "public"."reaction"."id_reaction";
SELECT setval('"public"."reaction_id_reaction_seq"', 28, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."table_id_table_seq"
OWNED BY "public"."table"."id_table";
SELECT setval('"public"."table_id_table_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_id_user_seq"
OWNED BY "public"."user"."id_user";
SELECT setval('"public"."user_id_user_seq"', 76, true);

-- ----------------------------
-- Indexes structure for table account_type
-- ----------------------------
CREATE UNIQUE INDEX "account_type_account_type_uindex" ON "public"."account_type" USING btree (
  "account_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "account_type_id_account_type_uindex" ON "public"."account_type" USING btree (
  "id_account_type" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table account_type
-- ----------------------------
ALTER TABLE "public"."account_type" ADD CONSTRAINT "account_type_pk" PRIMARY KEY ("id_account_type");

-- ----------------------------
-- Indexes structure for table board
-- ----------------------------
CREATE UNIQUE INDEX "board_id_board_uindex" ON "public"."board" USING btree (
  "id_board" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "board_id_iser_uindex" ON "public"."board" USING btree (
  "id_user" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table board
-- ----------------------------
ALTER TABLE "public"."board" ADD CONSTRAINT "board_pk" PRIMARY KEY ("id_board");

-- ----------------------------
-- Indexes structure for table calculator
-- ----------------------------
CREATE UNIQUE INDEX "calculator_endpoint_calculator_uindex" ON "public"."calculator" USING btree (
  "endpoint_calculator" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "calculator_name_calculator_uindex" ON "public"."calculator" USING btree (
  "name_calculator" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table calculator
-- ----------------------------
ALTER TABLE "public"."calculator" ADD CONSTRAINT "calculator_pk" PRIMARY KEY ("id_calculator");

-- ----------------------------
-- Indexes structure for table chemical_element
-- ----------------------------
CREATE UNIQUE INDEX "chemical_element_id_chemical_element_uindex" ON "public"."chemical_element" USING btree (
  "id_chemical_element" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "chemical_element_name_chemical_element_uindex" ON "public"."chemical_element" USING btree (
  "name_chemical_element" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "chemical_element_sign_chemical_element_uindex" ON "public"."chemical_element" USING btree (
  "sign_chemical_element" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table chemical_element
-- ----------------------------
ALTER TABLE "public"."chemical_element" ADD CONSTRAINT "chemical_element_pk" PRIMARY KEY ("id_chemical_element");

-- ----------------------------
-- Primary Key structure for table reaction
-- ----------------------------
ALTER TABLE "public"."reaction" ADD CONSTRAINT "reaction_pk" PRIMARY KEY ("id_reaction");

-- ----------------------------
-- Indexes structure for table table
-- ----------------------------
CREATE UNIQUE INDEX "table_name_table_uindex" ON "public"."table" USING btree (
  "name_table" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table table
-- ----------------------------
ALTER TABLE "public"."table" ADD CONSTRAINT "table_pk" PRIMARY KEY ("id_table");

-- ----------------------------
-- Indexes structure for table user
-- ----------------------------
CREATE UNIQUE INDEX "user_e-mail_uindex" ON "public"."user" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "user_id_user_uindex" ON "public"."user" USING btree (
  "id_user" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_pk" PRIMARY KEY ("id_user");

-- ----------------------------
-- Foreign Keys structure for table board
-- ----------------------------
ALTER TABLE "public"."board" ADD CONSTRAINT "board_user_id_user_fk" FOREIGN KEY ("id_user") REFERENCES "public"."user" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table board-calculator
-- ----------------------------
ALTER TABLE "public"."board-calculator" ADD CONSTRAINT "board-calculator_board_id_board_fk" FOREIGN KEY ("id_board") REFERENCES "public"."board" ("id_board") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."board-calculator" ADD CONSTRAINT "board-calculator_calculator_id_calculator_fk" FOREIGN KEY ("id_calculator") REFERENCES "public"."calculator" ("id_calculator") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table board-table
-- ----------------------------
ALTER TABLE "public"."board-table" ADD CONSTRAINT "board-table_board_id_board_fk" FOREIGN KEY ("id_board") REFERENCES "public"."board" ("id_board") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."board-table" ADD CONSTRAINT "board-table_table_id_table_fk" FOREIGN KEY ("id_table") REFERENCES "public"."table" ("id_table") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_account_type_id_account_type_fk" FOREIGN KEY ("id_account_type") REFERENCES "public"."account_type" ("id_account_type") ON DELETE CASCADE ON UPDATE CASCADE;
