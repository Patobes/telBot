#!/bin/bash
# Script: ifconfig.sh
# Purpose: Diplay ifconfig info
# -------------------------------------------------------

if [ "$1" != "" ]; then
    ifconfig "$1"
else
    ifconfig
fi
