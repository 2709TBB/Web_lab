
let calculationHistory = [];

function appendToDisplay(value) {
    const display = document.getElementById('display');
    display.value += value; // 
}


function clearDisplay() {
    const display = document.getElementById('display');
    display.value = ''; 
}

function infixToPostfix(infix) {
    const stack = [];
    let postfix = '';
    const precedence = (operator) => {
        if (operator === '+' || operator === '-') return 1;
        if (operator === '*' || operator === '/') return 2;
        return 0;
    };

    let i = 0;
    while (i < infix.length) {
        const token = infix[i];

        if (!isNaN(token)) {
        
            let number = '';
            while (i < infix.length && !isNaN(infix[i])) {
                number += infix[i];
                i++;
            }
            postfix += number + ' '; 
            continue;
        } else if (token === '(') {
            stack.push(token);
        } else if (token === ')') {
            while (stack.length && stack[stack.length - 1] !== '(') {
                postfix += stack.pop() + ' ';
            }
            stack.pop(); 
        } else {
            while (
                stack.length &&
                precedence(token) <= precedence(stack[stack.length - 1])
            ) {
                postfix += stack.pop() + ' ';
            }
            stack.push(token);
        }
        i++;
    }

    while (stack.length) {
        postfix += stack.pop() + ' ';
    }

    return postfix.trim(); 
}


function evaluatePostfix(postfix) {
    const stack = [];
    const tokens = postfix.split(' '); 

    for (let i = 0; i < tokens.length; i++) {
        const token = tokens[i];
        if (!isNaN(token)) {
           
            stack.push(Number(token));
        } else {
            
            const b = stack.pop();
            const a = stack.pop();
            switch (token) {
                case '+': stack.push(a + b); break;
                case '-': stack.push(a - b); break;
                case '*': stack.push(a * b); break;
                case '/': stack.push(a / b); break;
            }
        }
    }

    return stack.pop(); 
}


function calculate() {
    const display = document.getElementById('display');
    const infixExpression = display.value;

    try {
        const postfixExpression = infixToPostfix(infixExpression); 
        const result = evaluatePostfix(postfixExpression);
        display.value = result; 
        addToHistory(`${infixExpression} = ${result}`); 
    } catch (error) {
        display.value = 'Error'; 
    }
}


function addToHistory(calculation) {
    calculationHistory.push(calculation);
    displayHistory();
}


function displayHistory() {
    const historyContainer = document.getElementById('history');
    historyContainer.innerHTML = ''; 
    calculationHistory.forEach((calc, index) => {
        const historyItem = document.createElement('div');
        historyItem.textContent = `${index + 1}: ${calc}`;
        historyContainer.appendChild(historyItem);
    });
}


function clearHistory() {
    calculationHistory = [];
    displayHistory();
}