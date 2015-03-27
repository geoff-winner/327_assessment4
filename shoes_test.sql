--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: brands; Type: TABLE; Schema: public; Owner: Geoff; Tablespace: 
--

CREATE TABLE brands (
    id integer NOT NULL,
    size integer,
    brand_name character varying
);


ALTER TABLE brands OWNER TO "Geoff";

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: Geoff
--

CREATE SEQUENCE brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE brands_id_seq OWNER TO "Geoff";

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Geoff
--

ALTER SEQUENCE brands_id_seq OWNED BY brands.id;


--
-- Name: stores; Type: TABLE; Schema: public; Owner: Geoff; Tablespace: 
--

CREATE TABLE stores (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE stores OWNER TO "Geoff";

--
-- Name: stores_brands; Type: TABLE; Schema: public; Owner: Geoff; Tablespace: 
--

CREATE TABLE stores_brands (
    id integer NOT NULL,
    brand_id integer,
    store_id integer
);


ALTER TABLE stores_brands OWNER TO "Geoff";

--
-- Name: stores_brands_id_seq; Type: SEQUENCE; Schema: public; Owner: Geoff
--

CREATE SEQUENCE stores_brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_brands_id_seq OWNER TO "Geoff";

--
-- Name: stores_brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Geoff
--

ALTER SEQUENCE stores_brands_id_seq OWNED BY stores_brands.id;


--
-- Name: stores_id_seq; Type: SEQUENCE; Schema: public; Owner: Geoff
--

CREATE SEQUENCE stores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_id_seq OWNER TO "Geoff";

--
-- Name: stores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Geoff
--

ALTER SEQUENCE stores_id_seq OWNED BY stores.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Geoff
--

ALTER TABLE ONLY brands ALTER COLUMN id SET DEFAULT nextval('brands_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Geoff
--

ALTER TABLE ONLY stores ALTER COLUMN id SET DEFAULT nextval('stores_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Geoff
--

ALTER TABLE ONLY stores_brands ALTER COLUMN id SET DEFAULT nextval('stores_brands_id_seq'::regclass);


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: Geoff
--

COPY brands (id, size, brand_name) FROM stdin;
\.


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('brands_id_seq', 292, true);


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: Geoff
--

COPY stores (id, name) FROM stdin;
\.


--
-- Data for Name: stores_brands; Type: TABLE DATA; Schema: public; Owner: Geoff
--

COPY stores_brands (id, brand_id, store_id) FROM stdin;
1	52	96
2	53	96
3	54	101
4	55	101
5	56	106
6	57	106
7	111	63
8	111	64
9	116	70
10	116	71
11	123	79
12	123	80
13	130	89
14	130	90
15	137	99
16	137	100
17	144	109
18	144	110
19	151	119
20	151	120
21	158	129
22	158	130
23	165	139
24	165	140
25	166	146
26	167	147
27	148	147
28	172	149
29	172	150
30	173	156
31	178	157
32	178	158
33	179	164
34	180	165
35	166	165
36	185	167
37	185	168
38	186	174
39	187	175
40	176	175
41	192	177
42	192	178
43	184	193
44	185	194
45	185	186
46	199	187
47	199	188
48	200	194
49	201	195
50	196	195
51	206	197
52	206	198
53	207	204
54	208	205
55	206	205
56	213	207
57	213	208
58	214	214
59	215	215
60	216	215
61	220	217
62	220	218
63	221	224
64	222	225
65	226	225
66	227	227
67	227	228
68	228	234
69	229	235
70	236	235
71	234	237
72	234	238
73	235	244
74	236	245
75	246	245
76	241	247
77	241	248
78	242	254
79	243	255
80	256	255
81	248	257
82	248	258
83	249	264
84	250	265
85	266	265
86	255	267
87	255	268
88	256	274
89	257	275
90	276	275
91	262	277
92	262	278
93	263	284
94	264	285
95	286	285
96	269	287
97	269	288
98	270	294
99	275	295
100	275	296
101	276	302
102	303	302
103	281	304
104	281	305
105	282	311
106	283	312
107	284	312
108	289	313
109	289	314
110	290	320
111	291	321
112	292	321
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('stores_brands_id_seq', 112, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('stores_id_seq', 321, true);


--
-- Name: brands_pkey; Type: CONSTRAINT; Schema: public; Owner: Geoff; Tablespace: 
--

ALTER TABLE ONLY brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: stores_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: Geoff; Tablespace: 
--

ALTER TABLE ONLY stores_brands
    ADD CONSTRAINT stores_brands_pkey PRIMARY KEY (id);


--
-- Name: stores_pkey; Type: CONSTRAINT; Schema: public; Owner: Geoff; Tablespace: 
--

ALTER TABLE ONLY stores
    ADD CONSTRAINT stores_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: Geoff
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM "Geoff";
GRANT ALL ON SCHEMA public TO "Geoff";
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

