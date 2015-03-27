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

COPY brands (id, brand_name) FROM stdin;
\.


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('brands_id_seq', 14, true);


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: Geoff
--

COPY stores (id, name) FROM stdin;
\.


--
-- Data for Name: stores_brands; Type: TABLE DATA; Schema: public; Owner: Geoff
--

COPY stores_brands (id, brand_id, store_id) FROM stdin;
1	3	2
2	3	2
3	3	2
4	3	2
5	3	2
6	3	2
7	1	2
8	4	2
9	3	1
10	3	1
11	1	2
12	1	2
13	7	11
14	7	11
15	7	11
16	7	11
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('stores_brands_id_seq', 16, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Geoff
--

SELECT pg_catalog.setval('stores_id_seq', 18, true);


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

