import {addClassIfDoesntExist, removeClassIfExists} from "./helpers.js";

function setCharCounterColor(counter, input) {
    let characterCounterSpan = input.nextElementSibling;
    if (counter < 0) {
        removeClassIfExists(characterCounterSpan, "text-warning");
        addClassIfDoesntExist(characterCounterSpan, "text-danger");
    } else if (counter < 20) {
        removeClassIfExists(characterCounterSpan, "text-danger");
        addClassIfDoesntExist(characterCounterSpan, "text-warning");
    } else {
        removeClassIfExists(characterCounterSpan, "text-danger");
        removeClassIfExists(characterCounterSpan, "text-warning");
    }
}

export const countCharacters = (input, parentElementsSibling) => {
    var numOfEnteredCharsSpan;
    var maxNumOfCharsSpan;
    if (parentElementsSibling) {
        numOfEnteredCharsSpan = input.parentElement.nextElementSibling.children[0];
        maxNumOfCharsSpan = input.parentElement.nextElementSibling.children[1];
    } else {
        numOfEnteredCharsSpan = input.nextElementSibling.children[0];
        maxNumOfCharsSpan = input.nextElementSibling.children[1];
    }

    let numOfEnteredChars = input.value.length;
    let counter = maxNumOfCharsSpan.textContent - numOfEnteredChars;
    numOfEnteredCharsSpan.textContent = counter.toString();
    setCharCounterColor(counter, input);
};