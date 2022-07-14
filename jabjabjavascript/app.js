let person = {
  name: "Antonio Tagle",
  oficio: "programador",
  greet: function () {
    console.log(`Mi nombre es ${this.name}`);
  },
  describeOficio: function () {
    console.log(`Mi oficio es ${this.oficio}`);
  },
};

person.describeOficio();

let RosarioCastellanos = Object.create(person);
RosarioCastellanos.name="Rosario C"
RosarioCastellanos.despedida=function(){
  console.log(`Se despide de ustedes su amiga ${this.name}`)};
RosarioCastellanos.greet();
RosarioCastellanos.describeOficio();
RosarioCastellanos.despedida();
console.log(person);
console.log(RosarioCastellanos);
