CREATE TABLE vendors (
vend_id      	int      		NOT NULL AUTO_INCREMENT,
vend_name    	char(50) 	NOT NULL ,
vend_address 	char(50) 	NULL ,
vend_city    	char(50) 	NULL ,
vend_state   	char(5)  	NULL ,
vend_zip     	char(10) 	NULL ,
vend_country 	char(50) 	NULL ,
PRIMARY KEY (vend_id)
) ENGINE=InnoDB;

CREATE TABLE products(
prod_id    		char(10)	NOT NULL,
vend_id    		int           	NOT NULL,
prod_name  	char(255)     	NOT NULL ,
prod_price 	decimal(8,2)  	NOT NULL ,
prod_desc  	text          	NULL ,
PRIMARY KEY(prod_id)
) ENGINE=InnoDB;

ALTER TABLE products ADD CONSTRAINT 
                fk_products_vendors FOREIGN KEY (vend_id) 
                REFERENCES vendors (vend_id);
