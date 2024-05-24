# Hospital
Resumen

En este documentos se relatan diferentes aspectos del proyecto, Se relata la problemática describiendo así las diferentes falencias que presentan algunos hospitales en sus entregas de medicamentos, seguidamente se analiza la problemática para poder brindar una solución adecuada, además de mencionar los aspectos a solucionar y su propuesta de solución, para continuar, se visualizarán los objetivos y su respectiva justificación, para finalizar, se expondrá la metodología, diferentes matrices y tapas del proyecto para su realización.




Abstract

In this document different aspects of the project are described. The problem is described, describing the different shortcomings that some hospitals present in the delivery of medicines, followed by an analysis of the problem in order to provide an adequate solution, in addition to mentioning the aspects to be solved and the proposed solution, to continue, the objectives and their respective justification will be displayed, and finally, the methodology, different matrices and project covers will be presented for its implementation.







Introducción

El presente trabajo tiene como objetivo principal evaluar la calidad del software desarrollado para el aplicativo web de gestión hospitalaria, este documento, se llevará a cabo un análisis exhaustivo de los diversos aspectos del software, desde sus funcionalidades hasta su rendimiento y mantenibilidad, en estos momentos la calidad del software es un aspecto fundamental en el desarrollo de aplicaciones informáticas, especialmente en entornos críticos como el sector de la salud, ya que, la eficiencia, fiabilidad y seguridad del software pueden tener un impacto significativo en la atención al paciente y en la eficacia de los procesos hospitalarios.

Teniendo en cuenta la importancia de garantizar un aplicativo web robusto y confiable para la gestión de inventario de la farmacia hospitalaria, se ha realizado un análisis detallado de los requisitos y se ha implementado un sistema que cumple con las necesidades identificadas. Sin embargo, para asegurar que el software cumpla con los estándares de calidad requeridos, es necesario llevar a cabo una evaluación exhaustiva que permita identificar posibles áreas de mejora y garantizar la excelencia en su desempeño, es por esto que este documento presenta el proceso de evaluación de calidad del software desarrollado, abordando aspectos como la usabilidad, la seguridad, la eficiencia y la mantenibilidad del aplicativo web. A través de este análisis, se espera generar recomendaciones prácticas para optimizar el software y asegurar su cumplimiento con los más altos estándares de calidad.

1.	Objetivos
1.1.	Objetivo General
Evaluar la calidad del software desarrollado para el aplicativo web de gestión de inventario de la farmacia hospitalaria.
1.2.	Objetivos Específicos
➢	Realizar un análisis exhaustivo de los requisitos funcionales y no funcionales del aplicativo web.
➢	Identificar áreas de mejora y posibles deficiencias en el diseño, implementación y funcionamiento del software.
➢	Aplicar metodologías y técnicas de evaluación de calidad de software para verificar el cumplimiento de estándares y buenas prácticas.
➢	Generar informes detallados sobre los hallazgos y recomendaciones para mejorar la calidad del software.
➢	Proponer acciones correctivas y preventivas para abordar las deficiencias identificadas y garantizar la calidad continua del aplicativo web.









2.	Justificación
La evaluación de la calidad del software desarrollado para el control de inventario de medicamentos en farmacias hospitalarias es de vital importancia en la actualidad, una gestión eficiente de los inventarios de medicamentos no solo garantiza un funcionamiento constante de la farmacia, sino que también contribuye directamente a la atención integral y la seguridad de los pacientes.
La importancia de mantener un control preciso de los medicamentos en stock radica en varios aspectos clave:
Garantía de la satisfacción del paciente: Un inventario actualizado y bien abastecido asegura que los pacientes reciban los medicamentos que necesitan de manera oportuna y eficiente, la disponibilidad de medicamentos es crucial para satisfacer las necesidades de los pacientes.
Prevención de errores y riesgos para la salud: La gestión inadecuada de inventarios puede conducir a errores en la entrega de medicamentos, la falta de atención a los usuarios, la falta de productos en stock o la presencia de medicamentos vencidos. 
Optimización de los procesos internos: Un sistema de control de inventario eficiente no solo beneficia a los pacientes, sino que también mejora la eficiencia operativa de la farmacia.
En este contexto, la evaluación de la calidad del software desarrollado para el control de inventario de medicamentos en farmacias hospitalarias se convierte en un paso fundamental para garantizar la seguridad, eficacia y eficiencia de los servicios de atención médica. A través de este proceso, se busca identificar y corregir posibles deficiencias en el software, asegurando que cumpla con los estándares más altos de calidad y confiabilidad.
3.	Requerimientos funcionales y no funcionales
3.1.	Requerimientos funcionales

Tabla 1/ Registro Usuario
Identificación del requerimiento	RF01
Nombre del requerimiento	Registrar usuarios
Características	Los usuarios deberán registrarse para acceder a cualquier función del sistema. 
Descripción del requerimiento	El sistema permitirá al usuario (Cliente, operario, administrador) registrarse. El usuario debe suministrar datos como: Cédula, Nombre, Apellidos, E-mail, Número celular y dependiendo el tipo Usuario y contraseña.
Prioridad del requerimiento	Alta
Fuente: Creación Propia




Tabla 2/ Gestión Usuario
Identificación del requerimiento	RF02
Nombre del requerimiento	Gestión de usuarios
Características	El sistema permitiría al usuario modificar datos que se encuentren en el sistema.
Descripción del requerimiento	El administrador o el operario, podrá modificar los datos de los usuarios.
Prioridad del requerimiento	Alta
Fuente: Creación Propia




Tabla 3/ Autenticación
Identificación del requerimiento	RF03
Nombre del requerimiento	Autenticación usuario
Características	Los usuarios deberán autenticarse para acceder al sistema.
Descripción del requerimiento	El sistema permitirá ser consultado por cualquier usuario
(Administrador, operario) dependiendo la función y su nivel de
accesibilidad.
Prioridad del requerimiento	Alta
Fuente: Creación Propia

Tabla 4/ Registro de medicamentos
Identificación del requerimiento	RF04
Nombre del requerimiento	Registrar medicamentos
Características	El usuario de la farmacia podrá registrar los diferentes medicamentos en el sistema
Descripción del requerimiento	El sistema permitirá al usuario registrar las características del medicamento para que sea guardado en la base de datos, se suministrarán datos como: nombre, empaque, cantidad, presentación, vía administración, almacenamiento, especificaciones, precio, accesibilidad.
Prioridad del requerimiento	Alta
Fuente: Creación Propia

Tabla 5/ Gestión Medicamentos
Identificación del requerimiento	RF05
Nombre del requerimiento	Gestión medicamentos
Características	Los usuarios podrán modificar los datos de los medicamentos
Descripción del requerimiento	El sistema permitirá al usuario actualizar, borrar o consultar los datos de cualquier medicamento.
Prioridad del requerimiento	Alta
Fuente: Creación Propia

3.2.	Requerimientos no funcionales

A continuación, se presentan algunos posibles requisitos funcionales para un módulo de inventario de la farmacia de un hospital:

●	Registro de productos: El sistema debe permitir registrar la información de los productos de la farmacia, como nombre, código, descripción, y cantidad disponible.

●	Control de stock: El sistema debe realizar un seguimiento del stock de cada producto, permitiendo conocer la cantidad disponible en todo momento y emitiendo alertas cuando los niveles de stock están bajos.

●	Recepción de pedidos: El sistema debe permitir recibir y registrar los pedidos de productos realizados a externos, incluyendo información sobre los productos solicitados, cantidades.

●	Registro de ingresos y egresos: El sistema debe permitir registrar los movimientos de entrada y salida de productos en la farmacia, ya sea por compras a es, devoluciones, transferencias internas o dispensación de medicamentos a los pacientes.

●	Dispensación de medicamentos: El sistema debe permitir registrar la dispensación de medicamentos a los pacientes, mantener un registro de los medicamentos entregados, las dosis prescritas, el médico responsable.


●	Integración con sistemas externos: El sistema debe tener la capacidad de integrarse con otros sistemas utilizados en el hospital, como el sistema de gestión de pacientes o el sistema de facturación, para intercambiar información relevante y mantener actualizada la base de datos del inventario.

●	Seguridad y accesos: El sistema debe contar con medidas de seguridad para limitar el acceso a la información sensible, permitiendo diferentes niveles de acceso según el rol del usuario.

Estos son solo algunos de los requisitos funcionales y no funcionales que se pueden considerar para un módulo de inventario de la farmacia de un hospital. 




 
4.	Metodología
Para garantizar la calidad del software desarrollado, se optó por utilizar la metodología ágil Scrum. Esta metodología facilita la implementación de prácticas de calidad de software al permitir una entrega iterativa y continua, lo que favorece la detección temprana de problemas y la adaptación a los cambios.
4.1.	Etapas del proyecto
Tabla 6/ Etapas de la metodología
Etapas del Proyecto	Descripción 	Sprint


Análisis	Contextualización de la problemática, análisis exhaustivo de requisitos funcionales y no funcionales, establecimiento de métricas y estándares de calidad.	

1


Diseño	Diseño de la arquitectura del sistema, elaboración de diagramas UML, definición de estrategias de prueba y verificación, establecimiento de criterios de aceptación.	

2



Implementación	Implementación del aplicativo web, aplicación de técnicas de programación y diseño orientadas a la calidad, realización de pruebas unitarias y de integración.	


3



Pruebas	Realización de pruebas exhaustivas de funcionalidad, usabilidad, rendimiento, seguridad y mantenibilidad, implementación de acciones correctivas y preventivas.	


4
Fuente: Creación Propia
5.	Artefactos 
5.1. Diagrama Casos De Uso
 
Ilustración 1 / Diagrama de Casos De Uso
 
5.2. Diagrama Entidad Relación
 
Ilustración 2 / Diagrama Entidad Relación














5.3. Diagrama de Despliegue
 
Ilustración 3 / Diagrama de Despliegue
5.4. Diagrama de Bloques
 
Ilustración 4/ Diagrama de bloques








5.5. Diagrama BPMN.

 
Ilustración 5 / Diagrama BPMN.

 
6. Marco Teórico
El marco teórico proporciona una base conceptual y metodológica que sustenta el desarrollo y evaluación del software de gestión hospitalaria. Este marco abarca varios aspectos clave, incluyendo la calidad del software en el sector salud, las metodologías de desarrollo, y los estándares y prácticas de evaluación de calidad.
6.1. Calidad de Software en el Ámbito de la Salud
La calidad del software en el sector salud es crucial debido a la naturaleza crítica de sus aplicaciones. Los sistemas de gestión hospitalaria deben garantizar la precisión, seguridad y confiabilidad de los datos y procesos que manejan. La calidad del software se puede definir como el grado en el que un producto de software cumple con los requisitos especificados y satisface las necesidades del usuario en condiciones especificadas.
6.1.1. Importancia de la Calidad del Software en Salud
En el ámbito hospitalario, la calidad del software afecta directamente la eficiencia operativa, la atención al paciente y la seguridad. Un software defectuoso puede llevar a errores en la administración de medicamentos, diagnósticos incorrectos, y fallos en la gestión de datos críticos de los pacientes. Por lo tanto, la calidad del software no es solo una necesidad técnica, sino también un imperativo ético y de seguridad.
Impacto en la Atención al Paciente: La eficiencia y precisión del software en la gestión hospitalaria pueden mejorar significativamente la calidad de la atención al paciente. Por ejemplo, un sistema que gestione correctamente el inventario de medicamentos asegura que los pacientes reciban sus tratamientos a tiempo y en la dosis correcta.
Seguridad de los Datos: Los datos de los pacientes son extremadamente sensibles y requieren altos estándares de protección. La calidad del software incluye la implementación de medidas de seguridad robustas para proteger la información contra accesos no autorizados y ciberataques.
Cumplimiento Normativo: Los sistemas de software en el sector salud deben cumplir con diversas regulaciones y normativas que garantizan la privacidad y seguridad de la información de los pacientes, como la HIPAA en Estados Unidos y el GDPR en Europa.
6.1.2. Componentes de la Calidad del Software
La calidad del software puede evaluarse mediante varios componentes definidos por la norma ISO/IEC 25010, que proporciona un modelo de calidad para productos de software:
Funcionalidad: Capacidad del software para proporcionar funciones que satisfacen las necesidades explícitas e implícitas del usuario. Incluye aspectos como adecuación funcional, exactitud, interoperabilidad, cumplimiento funcional y seguridad.
Fiabilidad: Capacidad del software para mantener su nivel de desempeño bajo condiciones establecidas durante un periodo determinado. Incluye madurez, disponibilidad, tolerancia a fallos y capacidad de recuperación.
Usabilidad: Facilidad con la que los usuarios pueden aprender a usar el sistema, y su eficacia y satisfacción en un contexto de uso específico. Incluye capacidad de reconocimiento, facilidad de aprendizaje, operabilidad y protección contra errores de usuario.
Eficiencia: Capacidad del software para proporcionar el rendimiento adecuado en relación con la cantidad de recursos utilizados. Incluye comportamiento temporal y utilización de recursos.

Mantenibilidad: Facilidad con la que se pueden realizar modificaciones al software. Esto incluye modularidad, reusabilidad, analizabilidad, capacidad de modificado y capacidad de prueba.
Portabilidad: Capacidad del software para ser transferido de un entorno a otro. Incluye adaptabilidad, capacidad de instalación, coexistencia y capacidad de reemplazo.
6.2. Metodologías de Evaluación de Calidad
Para asegurar que el software desarrollado cumple con los estándares de calidad, es fundamental aplicar metodologías de evaluación adecuadas. Estas metodologías y estándares permiten medir y mejorar continuamente el software, asegurando que se cumplen las expectativas del usuario y los requisitos del sistema.
6.2.1. ISO/IEC 25010
La norma ISO/IEC 25010 es un estándar internacional que define un modelo de calidad del software. Este modelo incluye ocho características principales y 31 subcaracterísticas que describen la calidad del producto de software. La norma proporciona un marco para evaluar estas características y mejorar la calidad del software.
Características Principales de ISO/IEC 25010:
Adecuación Funcional: El grado en el cual las funciones proporcionadas por el sistema satisfacen las necesidades explícitas o implícitas de los usuarios.
Fiabilidad: La capacidad del software de mantener su nivel de desempeño bajo condiciones normales y anormales.
Usabilidad: Facilidad con la que los usuarios pueden utilizar el sistema.
Eficiencia de Desempeño: La capacidad del software para proporcionar un rendimiento adecuado en relación con la cantidad de recursos utilizados.
Mantenibilidad: Facilidad de modificación del software para corregir defectos, mejorar el rendimiento u otros atributos, o adaptarse a un entorno cambiado.
Portabilidad: Capacidad del software para ser transferido de un entorno a otro.
Seguridad: Capacidad del software para proteger la información y datos de manera que las personas o sistemas no autorizados no puedan leerlos o modificarlos.
Compatibilidad: Capacidad del software para interactuar con otros sistemas y productos de software.
La aplicación de ISO/IEC 25010 permite a los desarrolladores y evaluadores de software tener un marco de referencia claro y unificado para medir y asegurar la calidad del producto.
6.2.2. Metodologías Ágiles
Las metodologías ágiles, como Scrum, son ampliamente utilizadas en el desarrollo de software debido a su enfoque iterativo y colaborativo. Estas metodologías promueven la entrega continua de software funcional y la adaptación rápida a los cambios. En el contexto de la calidad del software, Scrum facilita la implementación de prácticas de calidad, como pruebas continuas y revisiones periódicas.
Principios de las Metodologías Ágiles:
Interacción y Colaboración: Prioriza la comunicación continua entre el equipo de desarrollo y los stakeholders para asegurar que los requisitos se entienden correctamente y se ajustan según sea necesario.
Entrega Iterativa: Divide el proyecto en pequeñas iteraciones o sprints, permitiendo entregar incrementos funcionales del software de forma regular.
Adaptación al Cambio: Permite ajustes en los requisitos y en el desarrollo basados en el feedback recibido durante el proceso de desarrollo.
Scrum en la Evaluación de Calidad:
Scrum es una de las metodologías ágiles más utilizadas. Incluye roles específicos (Scrum Master, Product Owner, Equipo de Desarrollo), eventos (Sprints, Daily Standups, Sprint Reviews, Sprint Retrospectives), y artefactos (Product Backlog, Sprint Backlog, Increment).
Sprints: Períodos de tiempo definidos (normalmente de 2 a 4 semanas) durante los cuales se desarrolla un incremento funcional del producto.
Revisión y Retroalimentación: Al final de cada sprint, se realiza una revisión del trabajo realizado y se obtiene retroalimentación de los stakeholders, lo que permite ajustar y mejorar el producto de forma continua.
6.2.3. Técnicas de Pruebas de Software
Las pruebas de software son fundamentales para la evaluación de la calidad. Algunas de las técnicas de pruebas más comunes incluyen:
Pruebas Unitarias: Verifican que cada componente individual del software funcione correctamente. Estas pruebas se enfocan en las unidades más pequeñas de código, como funciones o métodos, y aseguran que cada unidad se comporte según lo esperado de manera aislada.
Ejemplo: En un sistema de gestión hospitalaria, una prueba unitaria podría verificar que la función que calcula la dosis de un medicamento en función del peso del paciente devuelve los resultados correctos.
Pruebas de Integración: Aseguran que los diferentes componentes del sistema funcionen bien juntos. Estas pruebas se centran en la interacción entre unidades y módulos para identificar problemas en la integración.

Ejemplo: Verificar que el módulo de gestión de inventario se comunique correctamente con el módulo de dispensación de medicamentos, asegurando que las actualizaciones en el inventario se reflejen adecuadamente cuando se dispensa un medicamento.
Pruebas de Sistema: Evalúan el sistema completo para verificar que cumpla con los requisitos especificados. Estas pruebas abarcan todas las funciones y características del sistema en un entorno que simula el entorno de producción.
Ejemplo: Probar el sistema de gestión hospitalaria en su totalidad para asegurarse de que todas las funcionalidades, desde el registro de pacientes hasta la administración de inventarios y la generación de reportes, funcionen correctamente bajo condiciones normales de uso.
Pruebas de Aceptación: Validan que el software satisfaga las necesidades y expectativas del usuario final. Estas pruebas son realizadas normalmente por los usuarios finales o los clientes y verifican que el sistema cumpla con los criterios de aceptación previamente definidos.
Ejemplo: Los administradores de la farmacia hospitalaria utilizan el sistema para realizar tareas cotidianas y confirman que el sistema es fácil de usar, cumple con los requisitos y mejora la eficiencia de sus procesos.
Cada tipo de prueba es esencial para asegurar diferentes aspectos de la calidad del software. Las pruebas unitarias y de integración se enfocan en componentes y módulos específicos, mientras que las pruebas de sistema y de aceptación validan el comportamiento y la satisfacción del usuario en el contexto del sistema completo.




Referencias
MORALES, R. E. (19 de 12 de 2015). CONTROL DE INVENTARIOS DE MEDICAMENTOS E INSUMOS UTILIZANDO. Obtenido de CONTROL DE INVENTARIOS DE MEDICAMENTOS E INSUMOS UTILIZANDO: https://red.uao.edu.co/bitstream/handle/10614/8359/T06312.pdf;jsessionid=5CA2DA6B49E724C9D1256F52BB9D44D7?sequence=1
PEREZ, H. M. (05 de 04 de 2013). ANÁLISIS Y DISEÑO DE UN SISTEMA DE GESTIÓN DE INVENTARIO . Obtenido de ANÁLISIS Y DISEÑO DE UN SISTEMA DE GESTIÓN DE INVENTARIO : https://repositorio.unicartagena.edu.co/bitstream/handle/11227/734/421-%20TTG%20-%20AN%C3%81LISIS%20Y%20DISE%C3%91O%20DE%20UN%20SG%20DE%20INVENTARIO%20PARA%20LA%20FARMACIA%20DE%20LA%20FUNDACI%C3%93N%20MADRE%20HERLINDA%20MOISES%2C%20BASADO%20ABCVEN.pdf?seq
https://www.minsalud.gov.co/
