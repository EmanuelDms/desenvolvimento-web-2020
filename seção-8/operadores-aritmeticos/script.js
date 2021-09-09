/**
 * @param {*} valueToRound A value to be rounded
 * @param {*} numberOfDecimals Number of decimals to round
 * @returns Rounded float number
 */
function roundFloat(valueToRound, numberOfDecimals) {
  let numberOfDecimalsAuxiliar = 1;

  for (let i = 0; i < numberOfDecimals; i++) {
    numberOfDecimalsAuxiliar *= 10;
  }

  return Math.round(valueToRound * numberOfDecimalsAuxiliar) / numberOfDecimalsAuxiliar;
}

/**
 * @param {*} value A value to parse to meters
 * @returns A float number
 */
function parseMeters(value) {
  return value / 100;
}

/**
 * Indicates if the object has an empty property
 * @param {*} object 
 * @returns false or true value
 */
function isEmpty(object) {
  for (const key in object) {
    if (!object[key]) {
      return false;
    }
  }
  return true;
}

function calculateBMI(pounds, height) {
  let numberOfDecimalsToRound = 2;
  return roundFloat(pounds / roundFloat(height ** 2, numberOfDecimalsToRound), numberOfDecimalsToRound);
}

function BMIClassification(bmi) {
  if (bmi < 16) {
    return "Baixo peso muito grave";
  } else if (bmi >= 16 && bmi <= 16.99) {
    return "Baixo peso grave";
  } else if (bmi >= 17 && bmi <= 18.49) {
    return "Baixo peso";
  } else if (bmi >= 18.50 && bmi <= 24.99) {
    return "Peso normal";
  } else if (bmi >= 25 && bmi <= 29.99) {
    return "Sobrepeso";
  } else if (bmi >= 30 && bmi <= 34.99) {
    return "Obesidade grau I";
  } else if (bmi >= 35 && bmi <= 39.99) {
    return "Obesidade grau II";
  } else if (bmi >= 40) {
    return "Obesidade grau III";
  } else {
    return "Fora de classificação!";
  }
}

let form = document.getElementsByTagName('form')[0];
form.onsubmit = (e) => {
  e.preventDefault();

  let user = {
    name: document.getElementById('username').value,
    height: parseMeters(document.getElementById('height').value),
    pounds: parseFloat(document.getElementById('pounds').value) || 0,
    getClassification() {
      return BMIClassification(this.getBMI());
    },
    getBMI() {
      return calculateBMI(this.pounds, this.height)
    }
  }

  let h2 = document.getElementsByTagName('h2')[0];
  let message = "Valores vazios!";

  if (isEmpty(user)) {
    message = `${user.name} possui  índice  de  massa  corporal  igual  a ${user.getBMI()},  sendo  classificado  como: ${user.getClassification()}`;
  }

  h2.innerHTML = message;
}