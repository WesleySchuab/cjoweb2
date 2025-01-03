USE banco_web2;

INSERT INTO clientes (codigo, nome_completo, sexo, dt_nasc, email, telefone) VALUES
('A1B2C-D3E4F', 'João da Silva', 'masculino', '1985-01-05', 'joao.silva@email.com', '11911122334'),
('B2C3D-E4F5G', 'Maria Oliveira', 'feminino', '1990-02-15', 'maria.oliveira@email.com', '11922233445'),
('C3D4E-F5G6H', 'Carlos Eduardo', 'masculino', '1988-03-25', 'carlos.eduardo@email.com', '11933344556'),
('D4E5F-G6H7I', 'Ana Beatriz', 'feminino', '1991-04-30', 'ana.beatriz@email.com', '11944455667'),
('E5F6G-H7I8J', 'Ricardo Pereira', 'masculino', '1987-05-10', 'ricardo.pereira@email.com', '11955566778'),
('F6G7H-I8J9K', 'Fernanda Alves', 'feminino', '1993-06-20', 'fernanda.alves@email.com', '11966677889'),
('G7H8I-J9K0L', 'Felipe Moreira', 'masculino', '1986-07-01', 'felipe.moreira@email.com', '11977788990'),
('H8I9J-K0L1M', 'Juliana Costa', 'feminino', '1989-08-12', 'juliana.costa@email.com', '11988899001'),
('I9J0K-L1M2N', 'Eduardo Santos', 'masculino', '1994-09-23', 'eduardo.santos@email.com', '11999910112'),
('J0K1L-M2N3O', 'Patrícia Lima', 'feminino', '1992-10-05', 'patricia.lima@email.com', '11888821123'),
('K1L2M-N3O4P', 'Lucas Ferreira', 'masculino', '1995-11-15', 'lucas.ferreira@email.com', '11899932134'),
('L2M3N-O4P5Q', 'Tatiane Rocha', 'feminino', '1996-12-30', 'tatiane.rocha@email.com', '11900043145'),
('B2C3D-4E5F6', 'Maria Oliveira', 'feminino', '1990-03-12', 'maria.oliveira@email.com', '11987654321'),
('C3D4E-5F6G7', 'Carlos Souza', 'masculino', '1982-07-22', 'carlos.souza@email.com', '11976543210'),
('D4E5F-6G7H8', 'Ana Santos', 'feminino', '1995-02-18', 'ana.santos@email.com', '11999887766'),
('E5F6G-7H8I9', 'Pedro Alves', 'masculino', '1978-11-09', 'pedro.alves@email.com', '11988776655'),
('F6G7H-8I9J0', 'Bruna Lima', 'feminino', '1992-06-04', 'bruna.lima@email.com', '11977665544'),
('G7H8I-9J0K1', 'Lucas Ferreira', 'masculino', '1988-09-30', 'lucas.ferreira@email.com', '11966554433'),
('H8I9J-0K1L2', 'Juliana Costa', 'feminino', '1991-12-12', 'juliana.costa@email.com', '11955443322'),
('I9J0K-1L2M3', 'Fernando Moreira', 'masculino', '1985-05-25', 'fernando.moreira@email.com', '11944332211'),
('J0K1L-2M3N4', 'Roberta Almeida', 'feminino', '1996-08-14', 'roberta.almeida@email.com', '11933221100'),
('K1L2M-3N4O5', 'André Pereira', 'masculino', '1983-01-07', 'andre.pereira@email.com', '11922110099'),
('L2M3N-4O5P6', 'Débora Martins', 'feminino', '1994-03-19', 'debora.martins@email.com', '11911009988'),
('M3N4O-5P6Q7', 'Eduardo Vieira', 'masculino', '1980-12-20', 'eduardo.vieira@email.com', '11900998877'),
('N4O5P-6Q7R8', 'Flávia Barbosa', 'feminino', '1993-10-25', 'flavia.barbosa@email.com', '11989987766'),
('O5P6Q-7R8S9', 'Rafael Ribeiro', 'masculino', '1987-04-11', 'rafael.ribeiro@email.com', '11978876655'),
('P6Q7R-8S9T0', 'Isabela Araujo', 'feminino', '1992-02-17', 'isabela.araujo@email.com', '11967765544'),
('Q7R8S-9T0U1', 'Vinícius Rocha', 'masculino', '1986-06-30', 'vinicius.rocha@email.com', '11956654433'),
('R8S9T-0U1V2', 'Camila Melo', 'feminino', '1994-09-05', 'camila.melo@email.com', '11945543322'),
('S9T0U-1V2W3', 'Marcelo Nunes', 'masculino', '1981-08-22', 'marcelo.nunes@email.com', '11934432211'),
('T0U1V-2W3X4', 'Patrícia Cunha', 'feminino', '1997-11-03', 'patricia.cunha@email.com', '11923321100'),
('U1V2W-3X4Y5', 'Henrique Neves', 'masculino', '1984-02-15', 'henrique.neves@email.com', '11912210099'),
('V2W3X-4Y5Z6', 'Larissa Carvalho', 'feminino', '1995-05-27', 'larissa.carvalho@email.com', '11901109988'),
('W3X4Y-5Z6A7', 'Rodrigo Batista', 'masculino', '1989-07-14', 'rodrigo.batista@email.com', '11990098877'),
('X4Y5Z-6A7B8', 'Fernanda Souza', 'feminino', '1990-01-18', 'fernanda.souza@email.com', '11988987766'),
('Y5Z6A-7B8C9', 'Diego Gomes', 'masculino', '1985-03-22', 'diego.gomes@email.com', '11977876655'),
('Z6A7B-8C9D0', 'Tatiana Teixeira', 'feminino', '1993-11-11', 'tatiana.teixeira@email.com', '11966765544'),
('A7B8C-9D0E1', 'Guilherme Campos', 'masculino', '1987-04-06', 'guilherme.campos@email.com', '11955654433'),
('B8C9D-0E1F2', 'Beatriz Xavier', 'feminino', '1992-12-28', 'beatriz.xavier@email.com', '11944543322'),
('C9D0E-1F2G3', 'Thiago Duarte', 'masculino', '1983-08-01', 'thiago.duarte@email.com', '11933432211'),
('D0E1F-2G3H4', 'Adriana Figueiredo', 'feminino', '1991-05-08', 'adriana.figueiredo@email.com', '11922321100'),
('E1F2G-3H4I5', 'Felipe Silva', 'masculino', '1986-09-23', 'felipe.silva@email.com', '11911210099'),
('F2G3H-4I5J6', 'Paula Correia', 'feminino', '1994-07-19', 'paula.correia@email.com', '11901109988'),
('G3H4I-5J6K7', 'Jorge Lima', 'masculino', '1988-03-10', 'jorge.lima@email.com', '11990098877'),
('H4I5J-6K7L8', 'Monica Miranda', 'feminino', '1990-06-29', 'monica.miranda@email.com', '11988987766'),
('I5J6K-7L8M9', 'Igor Pires', 'masculino', '1985-11-02', 'igor.pires@email.com', '11977876655'),
('J6K7L-8M9N0', 'Natália Fonseca', 'feminino', '1993-04-04', 'natalia.fonseca@email.com', '11966765544'),
('K7L8M-9N0O1', 'Leonardo Macedo', 'masculino', '1989-02-28', 'leonardo.macedo@email.com', '11955654433'),
('L8M9N-0O1P2', 'Vivian Silva', 'feminino', '1992-01-16', 'vivian.silva@email.com', '11944543322'),
('M9N0O-1P2Q3', 'Renato Alves', 'masculino', '1983-12-24', 'renato.alves@email.com', '11933432211'),
('N0O1P-2Q3R4', 'Gabriela Melo', 'feminino', '1996-05-02', 'gabriela.melo@email.com', '11922321100'),
('O1P2Q-3R4S5', 'Victor Costa', 'masculino', '1984-08-15', 'victor.costa@email.com', '11911210099'),
('P2Q3R-4S5T6', 'Sofia Ferreira', 'feminino', '1995-10-09', 'sofia.ferreira@email.com', '11901109988'),
('Q3R4S-5T6U7', 'Matheus Vieira', 'masculino', '1987-06-17', 'matheus.vieira@email.com', '11990098877'),
('R4S5T-6U7V8', 'Clarissa Rocha', 'feminino', '1990-09-01', 'clarissa.rocha@email.com', '11988987766'),
('S5T6U-7V8W9', 'Otávio Souza', 'masculino', '1985-12-13', 'otavio.souza@email.com', '11977876655'),
('T6U7V-8W9X0', 'Alessandra Moreira', 'feminino', '1994-03-30', 'alessandra.moreira@email.com', '11966765544'),
('U7V8W-9X0Y1', 'Paulo Santos', 'masculino', '1988-07-05', 'paulo.santos@email.com', '11955654433'),
('V8W9X-0Y1Z2', 'Mariana Nascimento', 'feminino', '1991-02-08', 'mariana.nascimento@email.com', '11944543322'),
('Q0BJD-Y8PC0', 'Bruna Souza', 'masculino', '1951-09-03', 'bruna.souza@email.com', '11373152918'),
('U62HV-JS82H', 'Rafael Farias', 'feminino', '1958-10-16', 'rafael.farias@email.com', '11750696607'),
('WK7VQ-N58DM', 'Gabriel Rocha', 'feminino', '2000-11-24', 'gabriel.rocha@email.com', '11489664088'),
('OF8Y8-9S208', 'Bruno Correia', 'masculino', '1965-01-26', 'bruno.correia@email.com', '11559987399'),
('UALMJ-8J88I', 'Isabela Carvalho', 'feminino', '1996-10-02', 'isabela.carvalho@email.com', '11716456789'),
('O10AY-V67NO', 'Pedro Gomes', 'feminino', '1979-10-08', 'pedro.gomes@email.com', '11258185806'),
('AJXPJ-0UUH1', 'Renata Nascimento', 'feminino', '1964-12-04', 'renata.nascimento@email.com', '11850801658'),
('TPNRI-VKTYO', 'Paula Martins', 'feminino', '1966-05-30', 'paula.martins@email.com', '11300717282'),
('KCQHU-JCX05', 'Felipe Barros', 'feminino', '1965-03-14', 'felipe.barros@email.com', '11549674723'),
('CLFOF-MQ3Z9', 'Eduardo Monteiro', 'feminino', '1963-08-10', 'eduardo.monteiro@email.com', '11620399462'),
('PCM7D-IZPSV', 'Beatriz Correia', 'masculino', '2000-01-20', 'beatriz.correia@email.com', '11865571892'),
('W8U6D-Y6GMT', 'Ana Oliveira', 'feminino', '1994-07-26', 'ana.oliveira@email.com', '11771862080'),
('66OX2-IIERM', 'Bruno Correia', 'masculino', '1973-04-16', 'bruno.correia@email.com', '11041169729'),
('CUV9D-GLCMI', 'Alexandre Campos', 'feminino', '1959-08-19', 'alexandre.campos@email.com', '11202959996'),
('MKREB-59ZMX', 'Ana Oliveira', 'feminino', '1970-11-03', 'ana.oliveira@email.com', '11248521577'),
('7HZJ6-D30PV', 'Renata Nascimento', 'masculino', '1952-01-14', 'renata.nascimento@email.com', '11175678029'),
('RNP8T-FCHY2', 'Sofia Santos', 'feminino', '1986-04-16', 'sofia.santos@email.com', '11948411004'),
('KHFVX-P3H4Q', 'Patrícia Alves', 'feminino', '1981-11-16', 'patricia.alves@email.com', '11959964572'),
('XH9UU-V81WK', 'Isabela Carvalho', 'feminino', '1974-11-17', 'isabela.carvalho@email.com', '11782930900'),
('M6OIE-CXB0Q', 'Thiago Ribeiro', 'masculino', '1956-05-05', 'thiago.ribeiro@email.com', '11767341429'),
('DUR1M-5EBVR', 'Ricardo Souza', 'feminino', '1963-02-26', 'ricardo.souza@email.com', '11445788579'),
('5BHCQ-ZFTF9', 'Larissa Teixeira', 'feminino', '1980-07-10', 'larissa.teixeira@email.com', '11328275845'),
('4CWQ6-ZA8WJ', 'Alexandre Campos', 'masculino', '1952-07-06', 'alexandre.campos@email.com', '11791462943'),
('S8VQH-0HE4W', 'Roberto Costa', 'masculino', '1968-02-22', 'roberto.costa@email.com', '11821533498'),
('G8M3N-9BKHP', 'Júlia Fernandes', 'feminino', '1989-06-18', 'julia.fernandes@email.com', '11294485761'),
('BFMP4-KUYEJ', 'Rosa Silva', 'masculino', '1976-05-09', 'rosa.silva@email.com', '11734863043'),
('G6CQ4-POEUV', 'Patrícia Alves', 'masculino', '1980-11-23', 'patricia.alves@email.com', '11658984422'),
('GNLKR-0EB4H', 'Vanessa Vieira', 'masculino', '1994-04-19', 'vanessa.vieira@email.com', '11312024945'),
('603IJ-NH7JS', 'Ricardo Souza', 'feminino', '1970-04-18', 'ricardo.souza@email.com', '11365425790'),
('G4GV3-9XRDN', 'Carlos Pereira', 'feminino', '1983-09-29', 'carlos.pereira@email.com', '11949868691'),
('U3YJL-TIR2K', 'Larissa Teixeira', 'masculino', '2000-05-26', 'larissa.teixeira@email.com', '11927168332'),
('6EJUJ-EBCGY', 'Bruna Souza', 'masculino', '1999-05-14', 'bruna.souza@email.com', '11314463179'),
('M84LU-Z32T7', 'Fernanda Oliveira', 'feminino', '1974-05-04', 'fernanda.oliveira@email.com', '11075608534'),
('W9EOQ-KH08E', 'Cláudia Lima', 'masculino', '1991-08-14', 'claudia.lima@email.com', '11507901278'),
('UGJA4-GCJ2X', 'Pedro Gomes', 'masculino', '1975-04-12', 'pedro.gomes@email.com', '11515882277'),
('64IWN-GPX02', 'Cláudia Lima', 'masculino', '1958-01-29', 'claudia.lima@email.com', '11609363724'),
('FGQ3P-NGGOH', 'Otávio Cunha', 'masculino', '2004-02-14', 'otavio.cunha@email.com', '11570954805'),
('2QESR-NAJOB', 'Luciana Silva', 'feminino', '1964-05-10', 'luciana.silva@email.com', '11538229340'),
('8LVZ3-07ZR4', 'Beatriz Correia', 'feminino', '1960-05-29', 'beatriz.correia@email.com', '11685978236'),
('M972J-ZU8B2', 'Fernando Almeida', 'feminino', '1992-05-31', 'fernando.almeida@email.com', '11628517671'),
('AMSAR-XUQ32', 'Pedro Gomes', 'masculino', '1984-01-28', 'pedro.gomes@email.com', '11620965033'),
('I7FCQ-E74D6', 'Bruno Correia', 'feminino', '1972-05-26', 'bruno.correia@email.com', '11442798521'),
('VISH3-YU14T', 'Rosa Silva', 'feminino', '1969-11-30', 'rosa.silva@email.com', '11713362465'),
('VORTR-6LYM1', 'Rafael Farias', 'masculino', '1988-07-28', 'rafael.farias@email.com', '11790870500'),
('4CGZ5-ADZXC', 'Sofia Santos', 'masculino', '1980-05-18', 'sofia.santos@email.com', '11365992142'),
('LAZVF-TLIF9', 'Rafael Farias', 'feminino', '2003-04-28', 'rafael.farias@email.com', '11958749028');