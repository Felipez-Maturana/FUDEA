PA: 

SELECT * from socios where (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) )) <0;

UPDATE socios SET estadoSuscripcion = 0 WHERE idSocio IN 
( SELECT socios.idSocio where (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) ) ) <0   )


CREATE VIEW Q as (SELECT * from socios where (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) )) <0);

UPDATE socios SET estadoSuscripcion = 0 WHERE idSocio IN Q;






UPDATE socios SET estadoSuscripcion = 0 WHERE idSocio IN 
( SELECT socios.idSocio where (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) ) ) <0   )


UPDATE socios SET estadoSuscripcion = 0 WHERE (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) ) ) <0


UPDATE socios SET estadoSuscripcion = 0 WHERE (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) ) ) <0